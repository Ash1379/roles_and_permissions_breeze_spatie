<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::create('discounts', function (Blueprint $table) {
        $table->id();

        $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();
        $table->foreignId('sale_id')->nullable()->constrained()->nullOnDelete();

        $table->decimal('amount', 16, 2);
        $table->string('reason')->nullable();

        $table->timestamps();
    });
}


    public function down(): void {
        Schema::dropIfExists('discounts');
    }
};
