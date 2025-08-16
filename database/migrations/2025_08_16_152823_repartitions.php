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
         Schema::create('user_info', function (Blueprint $table) {
            $table
                ->id();
            $table
                ->integer('id_user')
                ->nullable(false);
            $table
                ->string('repartition_name')
                ->nullable(false);
            $table
                ->bigInteger('repartition_value')
                ->nullable(false);

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
        //
    }
};
