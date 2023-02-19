<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserConnectionsTable extends Migration
{
    public function up()
    {
        Schema::create('user_connections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('connection_id');
            $table->enum('status', ['pending', 'accepted'])->default('pending');
            $table->timestamps();

            $table->unique(['user_id', 'connection_id']);

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('connection_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_connections');
    }
}
