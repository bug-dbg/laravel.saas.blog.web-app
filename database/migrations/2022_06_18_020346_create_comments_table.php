<?php

use App\Models\Comment;
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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->string('comment');

            $table->foreignId('post_id')->index();
            $table->foreign('post_id')->references('id')->on('posts');

            $table->foreignId('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->dateTime(Comment::CREATED_AT);
            $table->dateTime(Comment::UPDATED_AT);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
