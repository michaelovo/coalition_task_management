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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('priority_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /* Attach foreign key checks */
            $table->foreign('priority_id')
                ->references('id')
                ->on('priorities')
                ->onDelete('set null');

            /* Attach foreign key checks */
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');

            /* Attach unique key checks */
            $table->unique(['name', 'project_id'], 'ProjectTask_keys_unique');
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
