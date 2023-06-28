<?php

namespace App\Console\Commands;

use App\Mail\AlertMail;
use App\Models\MajorEvent;
use App\Models\Notification;
use App\Models\Server;
use App\Models\ServerCheckResult;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ServerCheck80 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:check80';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check 80 port response ok';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $servers = Server::with(['operationServers' => function($query) {
            $query->where('enabled', 1)
                ->where('server_check_id', 2);
        }])->get();

        foreach ($servers as $server)
        {
            try {
                $response = Http::timeout(5)->connectTimeout(5)->get("http://" . trim(trim(trim($server->ip), '/')) . '/');
//                $response = Http::timeout(5)->connectTimeout(5)->get("http://127.0.0.1/");
            }
            catch (\Exception $ex)
            {
                //eroare
                $result = new ServerCheckResult();
                $result->server_id = $server->id;
                $result->server_check_id = 2;
                $result->status = 0;
                $result->save();

                $majorEvent = MajorEvent::where('trigger_reason', '80 OUT')->first();
                $notification = Notification::where('server_id', $server->id)
                    ->where('major_event_id', $majorEvent->id)
                    ->get()
                    ->last();
                if(!$notification || $notification->status === 1)
                {
                    $alert = new Notification();
                    $alert->server_id=$server->id;
                    $alert->major_event_id=$majorEvent->id;
                    $alert->title=$majorEvent->title;
                    $alert->description=$ex->getMessage();
                    $alert->status=0;
                    $alert->save();

                    $user = User::where('id', $server->user_id)->first();
                    $notif = $alert;
                    Mail::send(new AlertMail($user, $notif));

                }

                var_dump($server->name . ' error: ' . $ex->getMessage());
                continue;
            }

            if($response->successful() || $response->redirect())
            {
                //ok
                var_dump($server->name . ' ok');

                $result = new ServerCheckResult();
                $result->server_id = $server->id;
                $result->server_check_id = 2;
                $result->status = 1;
                $result->save();
            }
            else
            {
                //eroare
                var_dump($server->name . ' error');

                $result = new ServerCheckResult();
                $result->server_id = $server->id;
                $result->server_check_id = 2;
                $result->status = 0;
                $result->save();

                $majorEvent = null;
                if( $response->status() === 500){
                    $majorEvent = MajorEvent::where('trigger_reason', '80 OUT 500')->first();
                }
                if( $response->status() === 503){
                    $majorEvent = MajorEvent::where('trigger_reason', '80 OUT 503')->first();
                }
                else {
                    $majorEvent = MajorEvent::where('trigger_reason', '80 OUT')->first();
                }

                $notification = Notification::where('server_id', $server->id)
                    ->where('major_event_id', $majorEvent->id)
                    ->get()
                    ->last();
                if(!$notification || $notification->status === 1)
                {
                    $alert = new Notification();
                    $alert->server_id=$server->id;
                    $alert->major_event_id=$majorEvent->id;
                    $alert->title=$majorEvent->title;
                    $alert->description=$majorEvent->description;
                    $alert->status=0;
                    $alert->save();

                    $user = User::where('id', $server->user_id)->first();
                    $notif = $alert;
                    Mail::send(new AlertMail($user, $notif));

                }
            }

        }
        return Command::SUCCESS;
    }
}
