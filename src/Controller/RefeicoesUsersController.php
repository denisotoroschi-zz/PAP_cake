<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RefeicoesUsers Controller
 *
 * @property \App\Model\Table\RefeicoesUsersTable $RefeicoesUsers
 */
class RefeicoesUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Utilizadores', 'Refeicoes']
        ];
        $refeicoesUsers = $this->paginate($this->RefeicoesUsers);

        $this->set(compact('refeicoesUsers'));
        $this->set('_serialize', ['refeicoesUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Refeicoes User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refeicoesUser = $this->RefeicoesUsers->get($id, [
            'contain' => ['Utilizadores', 'Refeicoes']
        ]);

        $this->set('refeicoesUser', $refeicoesUser);
        $this->set('_serialize', ['refeicoesUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $refeicoesUser = $this->RefeicoesUsers->newEntity();
        if ($this->request->is('post')) {
            $refeicoesUser = $this->RefeicoesUsers->patchEntity($refeicoesUser, $this->request->data);
            if ($this->RefeicoesUsers->save($refeicoesUser)) {
                $this->Flash->success(__('The refeicoes user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The refeicoes user could not be saved. Please, try again.'));
        }
        $utilizadores = $this->RefeicoesUsers->Utilizadores->find('list', ['limit' => 200]);
        $refeicoes = $this->RefeicoesUsers->Refeicoes->find('list', ['limit' => 200]);
        $this->set(compact('refeicoesUser', 'utilizadores', 'refeicoes'));
        $this->set('_serialize', ['refeicoesUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Refeicoes User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $refeicoesUser = $this->RefeicoesUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refeicoesUser = $this->RefeicoesUsers->patchEntity($refeicoesUser, $this->request->data);
            if ($this->RefeicoesUsers->save($refeicoesUser)) {
                $this->Flash->success(__('The refeicoes user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The refeicoes user could not be saved. Please, try again.'));
        }
        $utilizadores = $this->RefeicoesUsers->Utilizadores->find('list', ['limit' => 200]);
        $refeicoes = $this->RefeicoesUsers->Refeicoes->find('list', ['limit' => 200]);
        $this->set(compact('refeicoesUser', 'utilizadores', 'refeicoes'));
        $this->set('_serialize', ['refeicoesUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Refeicoes User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refeicoesUser = $this->RefeicoesUsers->get($id);
        if ($this->RefeicoesUsers->delete($refeicoesUser)) {
            $this->Flash->success(__('The refeicoes user has been deleted.'));
        } else {
            $this->Flash->error(__('The refeicoes user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
