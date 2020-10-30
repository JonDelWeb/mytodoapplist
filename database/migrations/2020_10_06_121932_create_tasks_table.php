<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('detail')->nullable();
            $table->date('toDoFor')->nullable();
            $table->boolean('state')->default(false);
            $table->integer('list_id')->unsigned();
            $table->foreign('list_id')
                ->references('id')
                ->on('todo_lists')
                ->onDelete('cascade');
            $table->timestamp("completed_at")->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
