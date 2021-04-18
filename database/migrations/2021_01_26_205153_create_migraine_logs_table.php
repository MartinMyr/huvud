<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMigraineLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('migraine_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('comment')->nullable();
            $table->string('type');
            $table->integer('pain_level')->nullable();
            $table->date('date')->useCurrent();
            $table->integer('medicin_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('migraine_logs', function (Blueprint $table) {
            Schema::dropIfExists('migraine_logs');
        });
    }
}
