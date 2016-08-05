<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TextDocuments Controller
 *
 * @property \App\Model\Table\TextDocumentsTable $TextDocuments
 */
class TextDocumentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $textDocuments = $this->paginate($this->TextDocuments);

        $this->set(compact('textDocuments'));
        $this->set('_serialize', ['textDocuments']);
    }

    /**
     * View method
     *
     * @param string|null $id Text Document id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $textDocument = $this->TextDocuments->get($id, [
            'contain' => []
        ]);

        $this->set('textDocument', $textDocument);
        $this->set('_serialize', ['textDocument']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $textDocument = $this->TextDocuments->newEntity();
        if ($this->request->is('post')) {
            $textDocument = $this->TextDocuments->patchEntity($textDocument, $this->request->data);
            if ($this->TextDocuments->save($textDocument)) {
                $this->Flash->success(__('The text document has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The text document could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('textDocument'));
        $this->set('_serialize', ['textDocument']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Text Document id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $textDocument = $this->TextDocuments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $textDocument = $this->TextDocuments->patchEntity($textDocument, $this->request->data);
            if ($this->TextDocuments->save($textDocument)) {
                $this->Flash->success(__('The text document has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The text document could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('textDocument'));
        $this->set('_serialize', ['textDocument']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Text Document id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $textDocument = $this->TextDocuments->get($id);
        if ($this->TextDocuments->delete($textDocument)) {
            $this->Flash->success(__('The text document has been deleted.'));
        } else {
            $this->Flash->error(__('The text document could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
