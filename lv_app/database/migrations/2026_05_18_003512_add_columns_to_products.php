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
        Schema::table('products', function (Blueprint $table) {
            // 商品画像, タイプ, 説明, サイズ
            $table->string('image_url')->nullable()->after('name');                         // 商品画像
            $table->enum('type', ['シャツ', 'パンツ', '靴下', '帽子'])->after('image_url');     // 商品タイプ
            $table->string('desc')->after('sku');                                           // 商品説明
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
