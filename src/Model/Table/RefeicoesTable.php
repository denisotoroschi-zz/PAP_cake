<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Refeicoes Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Refeico get($primaryKey, $options = [])
 * @method \App\Model\Entity\Refeico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Refeico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Refeico|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Refeico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Refeico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Refeico findOrCreate($search, callable $callback = null, $options = [])
 */
class RefeicoesTable extends Table
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

        $this->table('refeicoes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsToMany('Users', [
            'foreignKey' => 'refeico_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'refeicoes_users'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->numeric('preco')
            ->requirePresence('preco', 'create')
            ->notEmpty('preco');

        $validator
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmpty('data');

        $validator
            ->requirePresence('sopa', 'create')
            ->notEmpty('sopa');

        $validator
            ->requirePresence('prato', 'create')
            ->notEmpty('prato');

        $validator
            ->requirePresence('sobremesa', 'create')
            ->notEmpty('sobremesa');

        $validator
            ->requirePresence('img', 'create')
            ->notEmpty('img');

        return $validator;
    }
}
