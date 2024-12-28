<?php

use App\Models\Intership;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use NunoMaduro\Collision\Adapters\Phpunit\State;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('interships', function(Blueprint $table){
            $table->foreignIdFor(Status::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');

        Schema::table('interships', function(Blueprint $table){
            $table->dropConstrainedForeignIdFor(Status::class);
        });
    }
};
