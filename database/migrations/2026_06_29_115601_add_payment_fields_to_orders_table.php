<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->after('id');
            $table->string('payment_method')->default('transfer')->after('notes'); // 'transfer' or 'cod'
            $table->string('payment_proof')->nullable()->after('payment_method');  // storage path
            $table->string('payment_status')->default('unpaid')->after('payment_proof'); // unpaid, pending_verification, verified
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'payment_method', 'payment_proof', 'payment_status']);
        });
    }
};
