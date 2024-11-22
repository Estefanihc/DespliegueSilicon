<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('purchases', function (Blueprint $table) {
            if (!Schema::hasColumn('purchases', 'quantity')) {
                $table->integer('quantity')->default(0)->after('supplier_id');
            }
        });
    }
    


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('purchases', function (Blueprint $table) {
        $table->dropColumn('quantity');
    });
}
};
