<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RefeicoesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RefeicoesUsersTable Test Case
 */
class RefeicoesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RefeicoesUsersTable
     */
    public $RefeicoesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.refeicoes_users',
        'app.utilizadores',
        'app.refeicoes',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RefeicoesUsers') ? [] : ['className' => 'App\Model\Table\RefeicoesUsersTable'];
        $this->RefeicoesUsers = TableRegistry::get('RefeicoesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RefeicoesUsers);

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
