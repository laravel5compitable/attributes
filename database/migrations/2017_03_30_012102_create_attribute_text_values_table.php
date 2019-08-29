<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeTextValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('rinvex.attributes.tables.attribute_text_values'), function (Blueprint $table) {
            // Columns
            $table->increments('id');
            $table->text('content');
            $table->integer('attribute_id')->unsigned();
            $table->integer('entity_id')->unsigned();
            $table->string('entity_type');
            $table->timestamps();

            // Indexes
            $table->foreign('attribute_id')->references('id')->on(config('rinvex.attributes.tables.attributes'))
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('rinvex.attributes.tables.attribute_text_values'));
    }
}