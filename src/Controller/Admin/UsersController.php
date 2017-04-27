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

 
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // loads backend template to all methods
        $this->viewBuilder()->layout('backend'); 
    }
  
	//Função que irá realizar o login
    public function Login()
    {
            //realizar o login
            if ($this->request->is('post')) 
            {
                $user = $this->Auth->identify();
                if($user['tipo'] == 'admin')
                {
                    $this->Auth->setUser($user);
                    return $this->redirect('/admin/users/listar');
                }
                else
                {
                    return $this->redirect('');
                }
            }
    }

    //Função que irá realizar o Logout
    public function Logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function Listar()
    {
        $query = $this->Users->find('all');
        $this->set('users',$query);
    }

    public function Adicionar()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('POST')) 
        {
            $user = $this->Users->patchEntity($user,$this->request->data());
            $user->pin = (new DefaultPasswordHasher)->hash($user->pin);
            //die(debug($user->pin));
            if($this->Users->save($user))
            {
              $this->redirect(['controller'=>'Users','action'=>'listar']);  
            }
        }
        $this->set('user',$user);
    }

    public function Editar($id)
    {
        $user = $this->Users->get($id);
        if($this->request->is('put'))
        {
            $entidade = $this->Users->patchEntity($user,$this->request->data());
            $this->Users->save($entidade);
            $this->redirect(['controller'=>'Users','action'=>'listar']);
        }
        $this->set('user',$user);
    }

    public function Eliminar($id)
    {
        $user = $this->Users->get($id);
        $this->Users->delete($user,$this->request->data());
        $this->redirect(['controller'=>'Users','action'=>'listar']);
    }

    //Função que irá bloquear o utilizador na base de dados
    public function bloquear($id)
  {
    $this->autoRender = false;
    $user = $this->Users->get($id);
    $user->status ="bloqueado";
    $this->Users->save($user);
    $this->redirect(['controller'=>'Users','action'=>'listar']);   
  }

  //Função que irá desbloquear o utilizador na base de dados
  public function ativar($id)
  {
    $this->autoRender = false;
    $user = $this->Users->get($id);
    $user->status ="ativado";
    $this->Users->save($user);
    $this->redirect(['controller'=>'Users','action'=>'listar']);
  }
}