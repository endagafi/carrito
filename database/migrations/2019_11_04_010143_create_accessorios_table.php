<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessorios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_producto');
            $table->string('nombre');
            $table->string('detalle');
            $table->unsignedInteger('stock')->default(0);
            $table->double('precio');
            $table->string('imagen');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessorios');
    }
}
