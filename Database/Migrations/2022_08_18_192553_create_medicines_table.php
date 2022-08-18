<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('bar_code')->nullable();
            $table->string('name')->nullable();
            $table->string('generic_name')->nullable();
            $table->text('details')->nullable();
            $table->string('strength')->nullable();
            $table->string('shelf')->nullable();
            $table->integer('price')->nullable();
            $table->integer('box_price')->nullable();
            $table->integer('manufacturer_price')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status');

            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('unit_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('type_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('leaf_id')->nullable()->constrained('leafs')->nullOnDelete();
            $table->foreignId('manufacturer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('added_by')->nullable()->constrained('users')->nullOnDelete();
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
        Schema::dropIfExists('medicines');
    }
};
