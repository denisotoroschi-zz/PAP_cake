<?php
namespace App\Controller;
 
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Controller\AppController;
use Cake\Event\Event;

use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */ 
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Refeicoes']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $refeicoes = $this->Users->Refeicoes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'refeicoes'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Refeicoes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $refeicoes = $this->Users->Refeicoes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'refeicoes'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //Função que irá realizar o login
    public function Login()
    {
        //realizar o login
        if ($this->request->is('post')) 
        {
            $user = $this->Auth->identify();
            if ($user['status'] == 'ativado') 
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                return $this->redirect('');
                $this->Flash->error(__('Nº Processo ou Pin ínvalido, tente novamente'));
            }
        }
    }

    //Função que irá realizar o Logout
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

     public function changePin()
    {

        $user = $this->Users->get($this->Auth->user('id'));
        if($this->request->is('put'))
        {
            $this->request->data['pin'] = (new DefaultPasswordHasher)->hash($this->request->data['new_pin']);
            unset($this->request->data['new_pin']);
            unset($this->request->data['pin_antigo']);
            unset($this->request->data['confirm_pin']);
            //die(debug($this->request->data));
            $entidade = $this->Users->patchEntity($user,$this->request->data());
            //die(debug($entidade));
            //$user->pin = (new DefaultPasswordHasher)->hash($user->pin);
            $this->Users->save($entidade);
            $this->redirect(['controller'=>'Refeicoes','action'=>'marcar']);
        }
        $this->set('user',$user);
    }

    public function info()
    {
        $query = $this->Users->get($this->Auth->user('id'));
        $this->set('user',$query);
    }

    public function saldoNormal()
    {
        $query = $this->Users->get($this->Auth->user('id'));
        $this->set('user',$query);
    }

    public function saldoSubsidiada()
    {
        $query = $this->Users->get($this->Auth->user('id'));
        $this->set('user',$query);
    }

    public function horario()
    {
        $query = $this->Users->get($this->Auth->user('id'));
        $this->set('user',$query);
    }
}
