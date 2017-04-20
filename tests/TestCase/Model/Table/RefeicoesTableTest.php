<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RefeicoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RefeicoesTable Test Case
 */
class RefeicoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RefeicoesTable
     */
    public $Refeicoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.refeicoes',
        'app.users',
        'app.refeicoes_users',
        'app.utilizadores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Refeicoes') ? [] : ['className' => 'App\Model\Table\RefeicoesTable'];
        $this->Refeicoes = TableRegistry::get('Refeicoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Refeicoes);

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
