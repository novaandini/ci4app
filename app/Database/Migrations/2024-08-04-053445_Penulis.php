<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penulis extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'institution' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'phone_number' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'social_media' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'skill' => [
                'type' => 'varchar',
                'constraint' => '255'
            ],
            'profile' => [
                'type' => 'longtext',
            ],
            'img' => [
                'type' => 'text',
                'null' => true
            ],
            'slug' => [
                'type' => 'text',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penulis');
    }

    public function down()
    {
        $this->forge->dropTable('penulis');
    }
}
