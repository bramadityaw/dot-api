<?php

use App\Models\Author;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     * Describes the schema for a `books` table
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Author::class)->constrained();
            $table->string('title');
            $table->text('summary');
            $table->unsignedInteger('page_length');
            $table->date('published_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Drops the `books` table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
