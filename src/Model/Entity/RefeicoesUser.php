<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RefeicoesUser Entity
 *
 * @property int $utilizadores_id
 * @property int $refeicoes_id
 * @property \Cake\I18n\Time $data
 * @property \Cake\I18n\Time $hora
 *
 * @property \App\Model\Entity\Utilizadore $utilizadore
 * @property \App\Model\Entity\Refeico $refeico
 */
class RefeicoesUser extends Entity
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
        'utilizadores_id' => false,
        'refeicoes_id' => false
    ];
}
