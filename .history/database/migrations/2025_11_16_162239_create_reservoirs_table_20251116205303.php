<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservoirs', function (Blueprint $table) {
            $table->id();
            // FK به products (هر مخزن برای یک نوع محصول است)
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->decimal('capacity_litre', 16, 3);
            $table->decimal('current_litre', 16, 3)->default(0);
            $table->string('location')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservoirs');
    }
};
