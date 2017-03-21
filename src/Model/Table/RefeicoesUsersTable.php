<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RefeicoesUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Utilizadores
 * @property \Cake\ORM\Association\BelongsTo $Refeicoes
 *
 * @method \App\Model\Entity\RefeicoesUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\RefeicoesUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RefeicoesUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RefeicoesUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefeicoesUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RefeicoesUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RefeicoesUser findOrCreate($search, callable $callback = null, $options = [])
 */
class RefeicoesUsersTable extends Table
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

        $this->table('refeicoes_users');
        $this->displayField('utilizadores_id');
        $this->primaryKey(['utilizadores_id', 'refeicoes_id']);

        $this->belongsTo('Utilizadores', [
            'foreignKey' => 'utilizadores_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Refeicoes', [
            'foreignKey' => 'refeicoes_id',
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
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmpty('data');

        $validator
            ->time('hora')
            ->requirePresence('hora', 'create')
            ->notEmpty('hora');

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
        $rules->add($rules->existsIn(['refeicoes_id'], 'Refeicoes'));

        return $rules;
    }
}
