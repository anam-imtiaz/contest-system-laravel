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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('account_type_id')->nullable();
            $table->foreign('account_type_id')->references('id')->on('account_type')->onDelete('cascade');
            $table->index('account_type_id');
            $table->string('vip_flag')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['account_type_id']);
            $table->dropColumn('account_type_id');
            $table->dropIndex(['account_type_id']);
            $table->dropColumn('vip_flag');
        });
    }
};
