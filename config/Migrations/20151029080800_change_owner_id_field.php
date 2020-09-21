<?php

class ChangeOwnerIdField extends \Migrations\AbstractMigration
{
    public function up()
    {
        $table = $this->table('oauth_sessions');
        $table
            ->changeColumn('owner_id', 'uuid');
        $table->update();
    }

    public function down()
    {
        $table = $this->table('oauth_sessions');
        $table->changeColumn('owner_id', 'uuid');
        $table->update();
    }
}
