<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'post_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 25
            ],
            'post_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'post_title_seo' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'post_status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default' => 'active'
            ],
            'post_type' => [
                'type' => 'ENUM',
                'constraint' => ['article', 'page'],
                'default' => 'article'
            ],
            'post_thumbnail' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'post_description' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'post_content' => [
                'type' => 'LONGTEXT'
            ],
            'post_time' => [
                'type' => 'TIMESTAMP',
                'null' => true // Set default value to NULL
            ]
        ]);

        $this->forge->addKey('post_id', true);
        $this->forge->addForeignKey('username', 'admin', 'username', 'CASCADE', 'CASCADE');
        $this->forge->createTable('posts', true);
    }

    public function down()
    {
        $this->forge->dropTable('posts', true);
    }
}
