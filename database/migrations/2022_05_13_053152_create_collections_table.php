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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('collection_category')->comment('jumma, dan box, mashik bazar collection, akdh');
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
        Schema::dropIfExists('collections');
    }
};
