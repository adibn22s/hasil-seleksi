<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePermissionRoleTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'permission_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'role_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('permission_id', 'permission', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('role_id', 'role', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('permission_role');
    }

    public function down()
    {
        //
    }
}
