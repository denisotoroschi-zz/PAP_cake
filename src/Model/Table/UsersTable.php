<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Refeicoes
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsToMany('Refeicoes', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'refeico_id',
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->integer('n_processo')
            ->requirePresence('n_processo', 'create')
            ->notEmpty('n_processo');

        $validator
            ->requirePresence('pin', 'create')
            ->notEmpty('pin');

        $validator
            ->requirePresence('morada', 'create')
            ->notEmpty('morada');

        $validator
            ->date('data_nascimento')
            ->requirePresence('data_nascimento', 'create')
            ->notEmpty('data_nascimento');

        $validator
            ->integer('ano')
            ->requirePresence('ano', 'create')
            ->notEmpty('ano');

        $validator
            ->requirePresence('turma', 'create')
            ->notEmpty('turma');

        $validator
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        $validator
            ->requirePresence('escalao', 'create')
            ->notEmpty('escalao');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->integer('nif')
            ->requirePresence('nif', 'create')
            ->notEmpty('nif');

        $validator
            ->numeric('saldo')
            ->requirePresence('saldo', 'create')
            ->notEmpty('saldo');

        $validator
            ->numeric('saldo_sub')
            ->requirePresence('saldo_sub', 'create')
            ->notEmpty('saldo_sub');

        $validator
            ->requirePresence('img', 'create')
            ->notEmpty('img');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
