<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Refeicoes Controller
 *
 * @property \App\Model\Table\RefeicoesTable $Refeicoes
 */
class RefeicoesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $refeicoes = $this->paginate($this->Refeicoes);

        $this->set(compact('refeicoes'));
        $this->set('_serialize', ['refeicoes']);
    }

    /**
     * View method
     *
     * @param string|null $id Refeico id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refeico = $this->Refeicoes->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('refeico', $refeico);
        $this->set('_serialize', ['refeico']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $refeico = $this->Refeicoes->newEntity();
        if ($this->request->is('post')) {
            $refeico = $this->Refeicoes->patchEntity($refeico, $this->request->data);
            if ($this->Refeicoes->save($refeico)) {
                $this->Flash->success(__('The refeico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The refeico could not be saved. Please, try again.'));
        }
        $users = $this->Refeicoes->Users->find('list', ['limit' => 200]);
        $this->set(compact('refeico', 'users'));
        $this->set('_serialize', ['refeico']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Refeico id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $refeico = $this->Refeicoes->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refeico = $this->Refeicoes->patchEntity($refeico, $this->request->data);
            if ($this->Refeicoes->save($refeico)) {
                $this->Flash->success(__('The refeico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The refeico could not be saved. Please, try again.'));
        }
        $users = $this->Refeicoes->Users->find('list', ['limit' => 200]);
        $this->set(compact('refeico', 'users'));
        $this->set('_serialize', ['refeico']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Refeico id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refeico = $this->Refeicoes->get($id);
        if ($this->Refeicoes->delete($refeico)) {
            $this->Flash->success(__('The refeico has been deleted.'));
        } else {
            $this->Flash->error(__('The refeico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function marcar()
    {
        
    }
}
