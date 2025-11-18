<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
{
    Schema::create('sales', function (Blueprint $table) {
        $table->id();
        $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
        $table->foreignId('product_id')->constrained()->cascadeOnDelete();

        $table->decimal('litres', 16,3);
        $table->decimal('rate', 16,2);
        $table->decimal('total', 16,2);

        $table->dateTime('sold_at')->nullable();

        $table->timestamps();
    });
}


    public function down(): void {
        Schema::dropIfExists('sales');
    }
};

