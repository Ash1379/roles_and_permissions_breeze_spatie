<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   public function up(): void
{
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();

        // هر نوع عملیات مالی ثبت می‌شود
        $table->enum('type', [
            'import', 'sale', 'payment', 'lend', 'cheque', 'expense'
        ]);

        // ردیف عملیاتی مربوطه
        $table->unsignedBigInteger('reference_id');

        // مبلغ تراکنش
        $table->decimal('amount', 16, 2);

        // تاریخ تراکنش
        $table->dateTime('transaction_date')->nullable();

        // یادداشت
        $table->text('notes')->nullable();

        $table->timestamps();
    });
}


    public function down(): void {
        Schema::dropIfExists('transactions');
    }
};
