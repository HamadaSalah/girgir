<?php

use App\Models\ServiceProvider;
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
        Schema::create('service_provide_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ServiceProvider::class)->constrained()->cascadeOnDelete();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('wechat')->nullable();
            $table->string('license_number')->nullable();
            $table->date('license_expire_date')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('province')->nullable();
            $table->string('zip_code')->nullable();

            $table->longText('mission')->nullable();
            $table->longText('vision')->nullable();
            $table->longText('values')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_provide_infos');
    }
};
