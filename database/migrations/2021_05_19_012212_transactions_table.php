<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_CuentaOrigen');
            $table->unsignedBigInteger('id_CuentaDestino');
            $table->text('addresee');
            $table->float('amount');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_CuentaOrigen')->references('id')->on('accounts');
            $table->foreign('id_CuentaDestino')->references('id')->on('accounts');
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
        //
    }
}
