<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Post;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->longText('description');

            $table->foreignId('team_id')->index();
            $table->foreign('team_id')->references('id')->on('teams');

            $table->foreignId('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->dateTime(Post::CREATED_AT);
            $table->dateTime(Post::UPDATED_AT);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
};
