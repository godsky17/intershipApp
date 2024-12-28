<?php

use App\Models\User;
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
        Schema::create('interships', function (Blueprint $table) {
            $table->id();
            $table->string('last_graduate');
            $table->date('last_graduate_date');
            $table->string('last_graduate_school');
            $table->string('skills')->nullable();
            $table->string('new_skills');
            $table->boolean('pair')->default(0);
            $table->string('pairName')->nullable();
            $table->boolean('computer')->default(1);
            $table->boolean('achieved')->default(0);
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interships');
    }
};
