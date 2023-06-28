<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
//            $table->integer('user_id');
            $table->integer('domain_id')->nullable();
            $table->integer('server_id')->nullable();
            $table->integer('task_id')->nullable();
            $table->integer('major_event_id')->nullable();
            $table->string('title')->nullable();
//            $table->nullableMorphs('title', 'type'); //Task/MajorEvent
            $table->text('description')->nullable();
            $table->string('importance')->nullable();
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
