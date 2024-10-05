<?php

use App\Enum\PriorityEnum;
use App\Enum\StatusEnum;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();

            $table->enum('status', [
                StatusEnum::COMPLETED->value,
                StatusEnum::IN_PROGRESS->value,
                StatusEnum::PENDING->value,
            ])->default(StatusEnum::PENDING->value);
            $table->enum('priority', [
                PriorityEnum::LOW->value,
                PriorityEnum::MEDIUM->value,
                PriorityEnum::HIGH->value,
            ])->default(PriorityEnum::LOW->value);
            $table->string('due_date')->nullable();
            $table->foreignId('assigned_user_id')->constrained('users');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->foreignId('project_id')->constrained('projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
