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
        Schema::create('monthly_expenses', function (Blueprint $table) {
            $table
                ->id();
            $table
                ->unsignedBigInteger('id_user')
                ->nullable(false);
            $table
                ->string('expense_name')
                ->nullable(false);
            $table
                ->bigInteger('expense_value')
                ->nullable(false);
            $table
                ->boolean('parceled')
                ->nullable(false)
                ->default(false);
            $table
                ->integer('parcels')
                ->nullable(true);

            // FK
            $table
                ->foreign('id_user')
                ->references('id')
                ->on('users')
                ->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_expenses');
    }
};
