<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProdutosUsers Controller
 *
 * @property \App\Model\Table\ProdutosUsersTable $ProdutosUsers
 */
class ProdutosUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $produtosUsers = $this->paginate($this->ProdutosUsers);

        $this->set(compact('produtosUsers'));
        $this->set('_serialize', ['produtosUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Produtos User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produtosUser = $this->ProdutosUsers->get($id, [
            'contain' => []
        ]);

        $this->set('produtosUser', $produtosUser);
        $this->set('_serialize', ['produtosUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produtosUser = $this->ProdutosUsers->newEntity();
        if ($this->request->is('post')) {
            $produtosUser = $this->ProdutosUsers->patchEntity($produtosUser, $this->request->data);
            if ($this->ProdutosUsers->save($produtosUser)) {
                $this->Flash->success(__('The produtos user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos user could not be saved. Please, try again.'));
        }
        $this->set(compact('produtosUser'));
        $this->set('_serialize', ['produtosUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produtos User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produtosUser = $this->ProdutosUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produtosUser = $this->ProdutosUsers->patchEntity($produtosUser, $this->request->data);
            if ($this->ProdutosUsers->save($produtosUser)) {
                $this->Flash->success(__('The produtos user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produtos user could not be saved. Please, try again.'));
        }
        $this->set(compact('produtosUser'));
        $this->set('_serialize', ['produtosUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produtos User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produtosUser = $this->ProdutosUsers->get($id);
        if ($this->ProdutosUsers->delete($produtosUser)) {
            $this->Flash->success(__('The produtos user has been deleted.'));
        } else {
            $this->Flash->error(__('The produtos user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
