<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{public function up(): void
{
    Schema::create('taxes', function (Blueprint $table) {
        $table->id();

        $table->string('title');
        $table->decimal('rate', 6, 2); // درصد مالیه

        $table->timestamps();
    });
}

}

