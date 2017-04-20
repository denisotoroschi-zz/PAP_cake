<?php
namespace App\Controller\Admin;
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Validation\Validation;
use Cake\Auth\DefaultPasswordHasher;
 
 
class RefeicoesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // loads backend template to all methods
        $this->viewBuilder()->layout('backend'); 
    }

    public function Listar()
    {
        $query = $this->Refeicoes->find('all');
        $this->set('refeicoes',$query);
    }

    public function Adicionar()
    {
        $refeicao = $this->Refeicoes->newEntity();
        if ($this->request->is('POST')) 
        {
            $refeicao = $this->Refeicoes->patchEntity($refeicao,$this->request->data());
            if($this->Refeicoes->save($refeicao))
            {
              $this->redirect(['controller'=>'Refeicoes','action'=>'listar']);  
            }
        }
        $this->set('refeicao',$refeicao);
    }

    public function Editar($id)
    {
        $refeicao = $this->Refeicoes->get($id);
        if($this->request->is('put'))
        {
            $entidade = $this->Refeicoes->patchEntity($refeicao,$this->request->data());
            $this->Refeicoes->save($entidade);
            $this->redirect(['controller'=>'Refeicoes','action'=>'listar']);
        }
        $this->set('refeicao',$refeicao);
    }

    public function Eliminar($id)
    {
        $refeicao = $this->Refeicoes->get($id);
        $this->Refeicoes->delete($refeicao,$this->request->data());
        $this->redirect(['controller'=>'Refeicoes','action'=>'listar']);
    }
}