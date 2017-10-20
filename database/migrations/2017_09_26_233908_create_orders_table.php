<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product', 10);
            $table->unsignedTinyInteger('gender', false)->default(0);
            $table->unsignedTinyInteger('size', false)->default(0);
            $table->string('name', 255);
            $table->string('email', 255)->nullable();
            $table->string('phone', 20);
            $table->string('address', 255);
            $table->text('message')->nullable();
            $table->date('date')->default(Carbon::now());
            $table->unsignedTinyInteger('status', false)->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}