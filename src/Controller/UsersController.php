<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\View\View;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);
        
        $this->set(compact('users'));
    }
    
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        
        $this->set(compact('user'));
    }
    
    public function signup()
    {
        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // echo $user;
            // die;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                
                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    
    public function login()
    {
        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $password =  $this->request->getData('password');

            $result = $this->Users->login($email, $password);
            if($result){
                    $this->Flash->success(__('The user has been logged in successfully.'));
                    
                    return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('Please enter valid credential..'));
        }
        $this->set(compact('user'));
    }
    
    public function list()
    {
        $this->viewBuilder()->setLayout('mydefault');
        $users = $this->paginate($this->Users);
        
        $this->set(compact('users'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            // print_r($this->request->getData());
            // echo $this->request->getData('first_name');
            // die;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // echo $user;
            // die;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
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

    public function mydelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'list']);
    }

    public $paginate = [
        'limit' => 10
    ];

    // this is only for getting data for particular id using UsersTable // custom function
    public function getdata($id = null)
    {
        $this->viewBuilder()->setLayout('mydefault');
        // $result = $this->Users->getdata($id);
        $result = $this->Users->getdata(50);
        echo '<pre>';
        print_r($result);
        die('ffffffffffffff');
    }
}
