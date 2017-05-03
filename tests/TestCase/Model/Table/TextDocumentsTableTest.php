<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TextDocumentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TextDocumentsTable Test Case
 */
class TextDocumentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TextDocumentsTable
     */
    public $TextDocuments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.text_documents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TextDocuments') ? [] : ['className' => 'App\Model\Table\TextDocumentsTable'];
        $this->TextDocuments = TableRegistry::get('TextDocuments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TextDocuments);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
