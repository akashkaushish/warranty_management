<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanStartFromTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_start_from', function (Blueprint $table) {
            $table->id();
			$table->string('distributor_id')->nullable();
			$table->string('distributor_name');
			$table->string('warranty_plan_id');
			$table->string('serial_number');
			$table->string('country');
			$table->date('sale_date');
			$table->date('delivery_date');
			$table->string('box_id')->nullable();
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
        Schema::dropIfExists('plan_start_from');
    }
}
