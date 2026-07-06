<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProducts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'           => ['type' => 'VARCHAR', 'constraint' => 255],
            'sku'            => ['type' => 'VARCHAR', 'constraint' => 100],
            'current_stock'  => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'min_stock'      => ['type' => 'INT', 'constraint' => 11, 'default' => 5],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('sku');
        $this->forge->addUniqueKey('name');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
