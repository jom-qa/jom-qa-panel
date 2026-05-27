<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('srs_pdf_path')->nullable();
            
            // Third-Party Telemetry Integration Keys (Encrypted)
            $table->text('trello_api_key')->nullable();
            $table->text('trello_token')->nullable();
            $table->string('trello_board_id')->nullable();
            
            $table->text('github_token')->nullable();
            $table->string('github_repo_owner')->nullable();
            $table->string('github_repo_name')->nullable();
            
            // Flutter App Connection
            $table->string('flutter_vm_service_uri')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
