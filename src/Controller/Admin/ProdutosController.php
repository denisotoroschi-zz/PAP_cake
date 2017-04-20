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


class ProdutosController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // loads backend template to all methods
        $this->viewBuilder()->layout('backend'); 
    }

    public function listar()
    {
        $query = $this->Produtos->find('all');
        $this->set('produtos',$query);
    }

    public function Adicionar()
    {
        $produto = $this->Produtos->newEntity();
        if ($this->request->is('POST')) 
        {
            $produto = $this->Produtos->patchEntity($produto,$this->request->data());
            if($this->Produtos->save($produto))
            {
              $this->redirect(['controller'=>'Produtos','action'=>'listar']);  
            }
        }
        $this->set('produto',$produto);
    }

    public function Editar($id)
    {
        $produto = $this->Produtos->get($id);
        if($this->request->is('put'))
        {
            $entidade = $this->Produtos->patchEntity($produto,$this->request->data());
            $this->Produtos->save($entidade);
            $this->redirect(['controller'=>'Produtos','action'=>'listar']);
        }
        $this->set('produto',$produto);
    }

    public function Eliminar($id)
    {
        $produto = $this->Produtos->get($id);
        $this->Produtos->delete($produto,$this->request->data());
        $this->redirect(['controller'=>'Produtos','action'=>'listar']);
    }
}