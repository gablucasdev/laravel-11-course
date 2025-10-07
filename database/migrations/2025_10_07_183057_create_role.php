<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if(Schema::hasTable("roles")) {
            Schema::create('role', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('description')->nullable();
                $table->timestamps();
            });
        } 

        if(Schema::hasTable("permissions")) {
            Schema::create("permission", function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }

        if(Schema::hasTable("role_permission")) {
            Schema::create("role_permission", function (Blueprint $table) {
                $table->id();
                $table->foreignId("role_id")->constrained("role")->cascadeOnDelete();
                $table->foreignId("permission_id")->constrained("permission")->cascadeOnDelete();
                $table->timestamps();
            });
        }
    }
};