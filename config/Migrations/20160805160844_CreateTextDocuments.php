<?php
use Migrations\AbstractMigration;

class CreateTextDocuments extends AbstractMigration
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
        $table = $this->table('text_documents');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('text', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('creator', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('creationDate', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
