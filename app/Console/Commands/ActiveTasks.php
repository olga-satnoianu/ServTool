<?php

namespace App\Console\Commands;

use App\Models\Notification;
use App\Models\Task;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ActiveTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:active';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tasks = Task::all();
        foreach ($tasks as $task) {
            $last_date = Carbon::parse($task->created_at);
            $current_date = Carbon::parse(date('Y-m-d H:i:s'));

            $type = $task->time_unit;
            $interval = $task->time_cicle;

            if($type==="Days"){
                $diffInDays = $last_date->diffInDays($current_date);
                if($diffInDays >= $interval){
                    $active_task=new Notification();
                    $active_task->title=$task->title;
                    $active_task->description=$task->description;
                    $active_task->status=0;
                    $active_task->task_id=$task->id;
                    $active_task->save();

                    $task->created_at = $current_date->format('Y-m-d H:i:s');
                    $task->save();
                }

            }
            elseif($type==="Weeks"){
                $diffInWeeks = $last_date->diffInWeeks($current_date);
                if($diffInWeeks >= $interval){
                    $active_task=new Notification();
                    $active_task->task_id=$task->id;
                    $active_task->title=$task->title;
                    $active_task->description=$task->description;
                    $active_task->status=0;
                    $active_task->save();

                    $task->created_at = $current_date->format('Y-m-d H:i:s');
                    $task->save();
                }
            }
            elseif($type==="Months"){
                $diffInMonths = $last_date->diffInMonths($current_date);
                if($diffInMonths >= $interval){
                    $active_task=new Notification();
                    $active_task->task_id=$task->id;
                    $active_task->title=$task->title;
                    $active_task->description=$task->description;
                    $active_task->status=0;
                    $active_task->save();

                    $task->created_at = $current_date->format('Y-m-d H:i:s');
                    $task->save();
                }
            }
            elseif($type==="Years"){
                $diffInYears = $last_date->diffInYears($current_date);
                if($diffInYears >= $interval){
                    $active_task=new Notification();
                    $active_task->task_id=$task->id;
                    $active_task->title=$task->title;
                    $active_task->description=$task->description;
                    $active_task->status=0;
                    $active_task->save();

                    $task->created_at = $current_date->format('Y-m-d H:i:s');
                    $task->save();
                }
            }
        }

        return Command::SUCCESS;
    }
}
