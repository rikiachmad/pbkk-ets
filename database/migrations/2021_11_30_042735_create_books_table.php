<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('book_type', ['magazine', 'paper', 'textbook']);
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('author')->nullable();
            $table->string('category')->nullable();
            $table->string('publisher', 40);
            $table->year('year_published');
            $table->text('description');
            $table->string('link', 100)->unique();
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
        Schema::dropIfExists('books');
    }
}
