<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecurityAccountsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecurityAccountsTable Test Case
 */
class SecurityAccountsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SecurityAccountsTable
     */
    public $SecurityAccounts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.security_accounts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SecurityAccounts') ? [] : ['className' => 'App\Model\Table\SecurityAccountsTable'];
        $this->SecurityAccounts = TableRegistry::get('SecurityAccounts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SecurityAccounts);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
