<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdutosUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdutosUsersTable Test Case
 */
class ProdutosUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdutosUsersTable
     */
    public $ProdutosUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.produtos_users',
        'app.utilizadores',
        'app.produtos',
        'app.users',
        'app.refeicoes',
        'app.refeicoes_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProdutosUsers') ? [] : ['className' => 'App\Model\Table\ProdutosUsersTable'];
        $this->ProdutosUsers = TableRegistry::get('ProdutosUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProdutosUsers);

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
