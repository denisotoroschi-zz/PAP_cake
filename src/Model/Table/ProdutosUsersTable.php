<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProdutosUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Utilizadores
 * @property \Cake\ORM\Association\BelongsTo $Produtos
 *
 * @method \App\Model\Entity\ProdutosUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProdutosUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProdutosUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProdutosUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProdutosUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProdutosUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProdutosUser findOrCreate($search, callable $callback = null, $options = [])
 */
class ProdutosUsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('produtos_users');
        $this->displayField('utilizadores_id');
        $this->primaryKey(['utilizadores_id', 'produtos_id', 'data_compra']);

        $this->belongsTo('Utilizadores', [
            'foreignKey' => 'utilizadores_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Produtos', [
            'foreignKey' => 'produtos_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->dateTime('data_compra')
            ->allowEmpty('data_compra', 'create');

        $validator
            ->dateTime('data_consumo')
            ->requirePresence('data_consumo', 'create')
            ->notEmpty('data_consumo');

        $validator
            ->integer('quantidade')
            ->requirePresence('quantidade', 'create')
            ->notEmpty('quantidade');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['utilizadores_id'], 'Utilizadores'));
        $rules->add($rules->existsIn(['produtos_id'], 'Produtos'));

        return $rules;
    }
}
