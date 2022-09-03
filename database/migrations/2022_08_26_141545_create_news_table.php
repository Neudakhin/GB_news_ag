<?php

use App\Models\News;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('source_id')
                ->nullable()
                ->constrained('sources')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->string('title');
            $table->string('author')->nullable();
            $table->text('text')->nullable();
            $table->enum('status', [
                News::DRAFT, News::ACTIVE, News::DISABLED
            ])->default(News::DRAFT);
            $table->timestamps();

            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
