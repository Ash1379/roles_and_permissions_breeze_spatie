<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cheques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->string('cheque_number');
            $table->decimal('amount', 10,2);
            $table->string('bank')->nullable();
            $table->date('due_date');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('cheques');
    }
};
.
