<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Signature');
            $table->integer('CategoryID')->nullable();
            $table->integer('ModelID')->nullable();
            $table->string('BrandName')->nullable();
            $table->dateTime('InDate')->nullable();
            $table->string('Purpose')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('Author')->nullable();
            $table->string('AssignedBy')->nullable();
            $table->string('CarriedBy')->nullable();
            $table->dateTime('AssignDate')->nullable();
            $table->integer('ApprovalStatus')->nullable();
            $table->dateTime('ApproveAt')->nullable();
            $table->string('TempAssignedBy')->nullable();
            $table->string('TempCarriedBy')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
