<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Menu Controller
 *
 * @property \App\Model\Table\MenuTable $Menu
 */
class MenuController extends AppController
{

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index ()
	{
		$menu = $this->paginate($this->Menu);

		$this->set(compact('menu'));
		$this->set('_serialize', ['menu']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id Menu id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view ($id = null)
	{
		$menu = $this->Menu->get($id, [
			'contain' => []
		]);

		$this->set('menu', $menu);
		$this->set('_serialize', ['menu']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add ()
	{
		$menu = $this->Menu->newEntity();
		if ($this->request->is('post')) {
			$menu = $this->Menu->patchEntity($menu, $this->request->data);
			if ($this->Menu->save($menu)) {
				$this->Flash->success(__('The menu has been saved.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The menu could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('menu'));
		$this->set('_serialize', ['menu']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Menu id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit ($id = null)
	{
		$menu = $this->Menu->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$menu = $this->Menu->patchEntity($menu, $this->request->data);
			if ($this->Menu->save($menu)) {
				$this->Flash->success(__('The menu has been saved.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The menu could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('menu'));
		$this->set('_serialize', ['menu']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Menu id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete ($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$menu = $this->Menu->get($id);
		if ($this->Menu->delete($menu)) {
			$this->Flash->success(__('The menu has been deleted.'));
		} else {
			$this->Flash->error(__('The menu could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
