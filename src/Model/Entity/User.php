<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $nome
 * @property int $n_processo
 * @property string $pin
 * @property string $morada
 * @property \Cake\I18n\Time $data_nascimento
 * @property int $ano
 * @property string $turma
 * @property string $tipo
 * @property string $escalao
 * @property string $email
 * @property int $nif
 * @property float $saldo
 * @property float $saldo_sub
 * @property string $img
 * @property string $horario
 *
 * @property \App\Model\Entity\Refeico[] $refeicoes
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _setPassword($pin)
    {
        return (new DefaultPasswordHasher)->hash($pin);
    }
}
