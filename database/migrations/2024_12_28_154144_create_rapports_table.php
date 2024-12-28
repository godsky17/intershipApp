<?php

use App\Models\Status;
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
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('title');
            $table->boolean('achieved')->default(0);
            $table->text('observation');
            $table->boolean('corbeille')->default(0);
            $table->foreignIdFor(Status::class)->constrained()->cascadeOnDelete();  // En attente de lectue / Lue / Lue et approuver
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();  // celui qui a ecrit le rapport
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
