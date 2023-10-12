<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('traffic_transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->integer('amount');
            $table->foreignIdFor(App\Models\User::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('status',['accepted','failed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traffic_transactions');
    }
};
