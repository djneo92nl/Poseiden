<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Profiles Controller
 *
 * @property \App\Model\Table\ProfilesTable $Profiles
 */
class ProfilesController extends AppController
{

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index ()
	{
		$profiles = $this->paginate($this->Profiles);

		$this->set(compact('profiles'));
		$this->set('_serialize', ['Profiles']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id Profile id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view ($id = null)
	{
		$profile = $this->Profiles->get($id, [
			'contain' => []
		]);

		$this->set('profile', $profile);
		$this->set('_serialize', ['Profile']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add ()
	{
		$Profile = $this->Profiles->newEntity();
		if ($this->request->is('post')) {
			$Profile = $this->Profiles->patchEntity($Profile, $this->request->data);
			if ($this->Profiles->save($Profile)) {
				$this->Flash->success(__('The Profile has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The Profile could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('Profile'));
		$this->set('_serialize', ['Profile']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Profile id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit ($id = null)
	{
		$Profile = $this->Profiles->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$Profile = $this->Profiles->patchEntity($Profile, $this->request->data);
			if ($this->Profiles->save($Profile)) {
				$this->Flash->success(__('The Profile has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The Profile could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('Profile'));
		$this->set('_serialize', ['Profile']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Profile id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete ($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$Profile = $this->Profiles->get($id);
		if ($this->Profiles->delete($Profile)) {
			$this->Flash->success(__('The Profile has been deleted.'));
		} else {
			$this->Flash->error(__('The Profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}
