<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('season');
            $table->string('status');
            $table->integer('period')->nullable();
            $table->string('time')->nullable();
            $table->boolean('postseason')->default(false);
            $table->integer('home_team_score')->nullable();
            $table->integer('visitor_team_score')->nullable();
            $table->unsignedBigInteger('home_team_id');
            $table->unsignedBigInteger('visitor_team_id');

            $table->foreign('home_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('visitor_team_id')->references('id')->on('teams')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
