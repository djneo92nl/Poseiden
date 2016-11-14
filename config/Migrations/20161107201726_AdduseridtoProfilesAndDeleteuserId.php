<?php
use Migrations\AbstractMigration;

class AdduseridtoProfilesAndDeleteuserId extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
	    $table = $this->table('profiles');
	    $table->addColumn('user_id', 'integer')
		    ->update();
	    $this->table('users')->removeColumn('userId')->update();

    }
}
