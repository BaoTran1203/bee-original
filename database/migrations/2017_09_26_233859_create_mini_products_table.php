<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiniProductsTable extends Migration
{
    public function up()
    {
        Schema::create('mini_products', function (Blueprint $table) {
            $table->string('id', 10);
            $table->primary('id');
            $table->string('image', 255);
            $table->unsignedTinyInteger('selected', false)->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('mini_products');
    }
}
