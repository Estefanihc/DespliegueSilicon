<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('ciaf_number')->nullable();
            $table->dateTime('purchase_date_time');
            $table->foreignId('employee_id')->constrained('users'); 
            $table->foreignId('supplier_id')->constrained('suppliers'); 
            $table->integer('quantity')->default(0); // Asegúrate de que esta línea esté aquí
            $table->decimal('price', 10, 2)->default(0.00); // Asegúrate de que esta línea también esté aquí
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
}
