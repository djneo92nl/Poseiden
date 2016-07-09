<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SecurityAccounts Controller
 *
 * @property \App\Model\Table\SecurityAccountsTable $SecurityAccounts
 */
class SecurityAccountsController extends AppController
{
    public $components = array('RequestHandler');


    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout','add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $securityAccounts = $this->paginate($this->SecurityAccounts);

        $this->set(compact('securityAccounts'));
        $this->set('_serialize', ['securityAccounts']);
    }

    /**
     * View method
     *
     * @param string|null $id Security Account id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $securityAccount = $this->SecurityAccounts->get($id, [
            'contain' => []
        ]);

        $this->set('securityAccount', $securityAccount);
        $this->set('_serialize', ['securityAccount']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $securityAccount = $this->SecurityAccounts->newEntity();
        if ($this->request->is('post')) {
            $securityAccount = $this->SecurityAccounts->patchEntity($securityAccount, $this->request->data);
            if ($this->SecurityAccounts->save($securityAccount)) {
                $this->Flash->success(__('The security account has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The security account could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('securityAccount'));
        $this->set('_serialize', ['securityAccount']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Security Account id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $securityAccount = $this->SecurityAccounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $securityAccount = $this->SecurityAccounts->patchEntity($securityAccount, $this->request->data);
            if ($this->SecurityAccounts->save($securityAccount)) {
                $this->Flash->success(__('The security account has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The security account could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('securityAccount'));
        $this->set('_serialize', ['securityAccount']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Security Account id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $securityAccount = $this->SecurityAccounts->get($id);
        if ($this->SecurityAccounts->delete($securityAccount)) {
            $this->Flash->success(__('The security account has been deleted.'));
        } else {
            $this->Flash->error(__('The security account could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    // In src/Controller/UsersController.php
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

}
