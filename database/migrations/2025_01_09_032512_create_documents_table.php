<?php

use App\Models\Theme;
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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('path'); // lien vers l'emplacement du document
            $table->text('recommandation')->nullable(); // les avis ou apport du sup hierachique
            $table->boolean('achieved')->default(0); 
            $table->boolean('corbeille')->default(0); 
            $table->foreignIdFor(Theme::class)->constrained()->cascadeOnDelete(); // realation one to one
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete(); // realation one to many
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
