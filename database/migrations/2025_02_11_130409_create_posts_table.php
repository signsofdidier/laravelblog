<?php

use App\Models\User;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained() //voegt een foreign key constrain toe (lijntje)
                ->cascadeOnDelete(); //verwijdert user als de rol wordt verwijderd
            //$table->foreignId('user'_id')->constrained()->cascadeOnDelete();
            $table->string('photo_id')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
