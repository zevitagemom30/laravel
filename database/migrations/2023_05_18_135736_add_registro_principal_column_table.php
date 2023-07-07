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
        Schema::table('municipes', function (Blueprint $table) {
            $table->boolean('registro_principal')->after('codigo_cns')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('municipes', function (Blueprint $table) {
            $table->dropColumn('registro_principal');
        });
    }
};
