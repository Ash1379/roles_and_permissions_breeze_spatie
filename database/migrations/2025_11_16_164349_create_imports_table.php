<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::create('imports', function (Blueprint $table) {
        $table->id();
        $table->foreignId('company_id')->constrained()->cascadeOnDelete();
        $table->foreignId('driver_id')->nullable()->constrained()->nullOnDelete();
        $table->foreignId('product_id')->constrained()->cascadeOnDelete();

        $table->decimal('litres', 16,3);
        $table->decimal('value', 16,2)->nullable();
        $table->string('serial_no')->nullable();
        $table->dateTime('imported_at')->nullable();
        $table->text('notes')->nullable();

        $table->timestamps();
    });
}


    public function down(): void {
        Schema::dropIfExists('imports');
    }
};
