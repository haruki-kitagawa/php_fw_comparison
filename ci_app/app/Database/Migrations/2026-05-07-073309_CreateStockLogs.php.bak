<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStockLogs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'product_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'type'           => ['type' => 'ENUM', 'constraint' => ['in', 'out']],
            'quantity'       => ['type' => 'INT', 'constraint' => 11],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        
        // 外部キー制約 (参照先テーブル, 参照先カラム, 削除時, 更新時)
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('stock_logs');
    }

    public function down()
    {
        $this->forge->dropTable('stock_logs');
    }
}
