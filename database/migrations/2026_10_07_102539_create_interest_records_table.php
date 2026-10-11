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
        Schema::create('interest_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('person_name');
            $table->decimal('principal_amount', 12, 2);
            $table->decimal('interest_rate', 5, 2);
            $table->enum('interest_type', ['monthly_rupees', 'yearly_percentage']);
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_interest', 12, 2);
            $table->decimal('final_amount', 12, 2);
            $table->enum('status', ['active', 'closed'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interest_records');
    }
};
