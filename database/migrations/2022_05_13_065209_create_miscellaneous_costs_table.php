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
        Schema::create('miscellaneous_costs', function (Blueprint $table) {
            $table->id();
            $table->integer('miscellaneous_cost_category_id')->unsigned();
            $table->dateTime('month');
            $table->float('amount', 9, 2);
            $table->string('description');
            $table->date('issue_date');
            $table->boolean('cost_status')->comment('1:debit, 2:credit');
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
        Schema::dropIfExists('miscellaneous_costs');
    }
};
