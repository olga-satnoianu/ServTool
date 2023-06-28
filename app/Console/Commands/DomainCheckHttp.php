<?php

namespace App\Console\Commands;

use App\Mail\AlertMail;
use App\Models\Domain;
use App\Models\DomainCheckResult;
use App\Models\MajorEvent;
use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class DomainCheckHttp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain:checkhttp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check http port response ok';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $domains = Domain::with(['domainOperations' => function ($query) {
            $query->where('enabled', 1)->where('domain_check_id', 2);
        }])->get();

        foreach ($domains as $domain)
        {
            try {
                $response = Http::timeout(5)->connectTimeout(5)->get("http://" . trim(trim(trim($domain->name), '/')) . "/");
            }
            catch (\Exception $e)
            {
                //eroare
                $result = new DomainCheckResult();
                $result->domain_id = $domain->id;
                $result->domain_check_id = 2;
                $result->status = 0;
                $result->save();

                $majorEvent = MajorEvent::where('trigger_reason', 'HTTP OUT')->first();
                $notification = Notification::where('domain_id', $domain->id)
                    ->where('major_event_id', $majorEvent->id)
                    ->get()
                    ->last();
                if(!$notification || $notification->status === 1)
                {
                    $alert = new Notification();
                    $alert->domain_id=$domain->id;
                    $alert->major_event_id=$majorEvent->id;
                    $alert->title=$majorEvent->title;
                    $alert->description=$e->getMessage();
                    $alert->status=0;
                    $alert->save();

                    $user = User::where('id', $domain->user_id)->first();
                    $notif = $alert;
                    Mail::send(new AlertMail($user, $notif));
                }

                var_dump($domain->name . ' error: ' . $e->getMessage());
                continue;
            }

            if($response->successful() || $response->redirect())
            {
                //ok
                var_dump($domain->name . ' ok');

                $result = new DomainCheckResult();
                $result->domain_id = $domain->id;
                $result->domain_check_id = 2;
                $result->status = 1;
                $result->save();
            }
            else
            {
                //eroare
                var_dump($domain->name . ' error');

                $result = new DomainCheckResult();
                $result->domain_id = $domain->id;
                $result->domain_check_id = 2;
                $result->status = 0;
                $result->save();

                $current_date = Carbon::parse(date('Y-m-d H:i:s'));

                $majorEvent = null;
                if( $response->status() === 500){
                    $majorEvent = MajorEvent::where('trigger_reason', 'HTTP OUT 500')->first();
                }
                if( $response->status() === 503){
                    $majorEvent = MajorEvent::where('trigger_reason', 'HTTP OUT 503')->first();
                }
                else {
                    $majorEvent = MajorEvent::where('trigger_reason', 'HTTP OUT')->first();
                }
                $notification = Notification::where('domain_id', $domain->id)
                    ->where('major_event_id', $majorEvent->id)
                    ->get()
                    ->last();
                if(!$notification || $notification->status === 1)
                {
                    $alert = new Notification();
                    $alert->domain_id=$domain->id;
                    $alert->major_event_id=$majorEvent->id;
                    $alert->title=$majorEvent->title;
                    $alert->description=$majorEvent->description;
                    $alert->status=0;
                    $alert->save();

                    $user = User::where('id', $domain->user_id)->first();
                    $notif = $alert;
                    Mail::send(new AlertMail($user, $notif));
                }

            }
        }
        return Command::SUCCESS;
    }
}
