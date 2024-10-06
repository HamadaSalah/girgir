<?php

use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceVariety;
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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['service', 'package']);
            $table->foreignIdFor(Order::class)->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('service_variety_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->nullOnDelete();
            $table->foreign('service_variety_id')->references('id')->on('service_varieties')->nullOnDelete();
            $table->string('service_title');
            $table->string('service_variety_title')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
