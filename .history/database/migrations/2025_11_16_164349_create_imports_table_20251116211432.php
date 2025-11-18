<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('driver_id')->nullable()->constrained('drivers')->nullOnDelete();
            $table->foreignId('reservoir_id')->nullable()->constrained('reservoirs')->nullOnDelete();
            $table->enum('product_type', ['petrol','diesel','gas','other'])->default('petrol');
            $table->decimal('litres', 16, 3);
            $table->string('serial_no')->nullable()->index();
            $table->decimal('value', 16, 2)->nullable();
            $table->dateTime('imported_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imports');
    }
};
