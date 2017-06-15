<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 */
class AppController extends Controller
{

	/**
	 * Initialization hook method.
	 *
	 * Use this method to add common initialization code like loading components.
	 *
	 * e.g. `$this->loadComponent('Security');`
	 *
	 * @return void
	 */
	public function initialize()
	{
		parent::initialize();

		$this->loadModel('Profiles');

		$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
		$this->loadComponent('Auth',
			[
				'authenticate' => [
					'Form' => [
						'userModel' => 'users',
						'fields'    => [
							'username' => 'username',
							'password' => 'password'
						]
					]
				],
				'loginAction'  => [
					'controller' => 'Users',
					'action'     => 'login'
				]
			]
		);
	}

	/**
	 * Before render callback.
	 *
	 * @param \Cake\Event\Event $event The beforeRender event.
	 * @return void
	 */
	public function beforeRender(Event $event)
	{
		if (!array_key_exists('_serialize', $this->viewVars) &&
			in_array($this->response->type(), ['application/json', 'application/xml'])
		) {
			$this->set('_serialize', true);
		}

		$user = $this->Auth->User();

		if (isset($user)) {
			$this->set('authUser', $user);
			$profile = $this->Profiles->get($user['id']);
			$this->set(compact('profile'));
		}

	}

	/**
	 * Function to return Json
	 *
	 */
	protected function setJsonResponse()
	{
		$this->loadComponent('RequestHandler');
		$this->RequestHandler->renderAs($this, 'json');
		$this->response->type('application/json');
	}
}
