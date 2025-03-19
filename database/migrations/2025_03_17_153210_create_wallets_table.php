<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('solde', 15, 2)->default(0); // Solde disponible pour retrait
            $table->decimal('benefice_total', 10, 2)->default(0); // Total des gains cumulés
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('wallets');
    }
};

