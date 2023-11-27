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
            $table->dropColumn('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('profile')->default('no_profile.jpeg');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->enum('usertype', ['superadmin','admin','doctor','patient'])->default('patient');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if( Schema::hasTable('users') ){
            Schema::table('users', function (Blueprint $table) {
                $table->string('name');
                $table->dropColumn('first_name');
                $table->dropColumn('last_name');
                $table->dropColumn('phone');
                $table->dropColumn('profile');
                $table->dropColumn('gender');
                $table->dropColumn('usertype');
            });
        }
    }
};
