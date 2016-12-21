<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeviceControllersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeviceControllersTable Test Case
 */
class DeviceControllersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeviceControllersTable
     */
    public $DeviceControllers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.device_controllers',
        'app.devices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DeviceControllers') ? [] : ['className' => 'App\Model\Table\DeviceControllersTable'];
        $this->DeviceControllers = TableRegistry::get('DeviceControllers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeviceControllers);

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
