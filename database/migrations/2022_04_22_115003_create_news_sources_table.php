<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news_sources', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 512);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_sources');
    }
};
