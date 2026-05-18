<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnsProducts extends Migration
{
    public function up()
    {
        // 追加する列を定義
        $fields = [
            'image_url' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255,
                'null'          => true,
                'after'         => 'name',
            ],
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['シャツ', 'パンツ', '靴下', '帽子'],
                'after'      => 'image_url',
            ],
            'desc' => [
                'type'  => 'TEXT',
                'null'  => false,
                'after' => 'sku',
            ],
        ];

        // 商品テーブルに列を追加
        $this->forge->addColumn('products', $fields);
    }

    public function down()
    {
        //
    }
}
