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

    public function myview($id = null)
    {
        $this->viewBuilder()->setLayout('mydefault');
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
            echo '<pre>';
            print_r($this->request->getData());
            // die;
            $user = $this->Users->patchEntity($user, $this->request->getData());
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
            if ($result) {
                $session = $this->getRequest()->getSession(); //get session
                $session->write('email', $email); //write name value to session
                $this->Flash->success(__('The user has been logged in successfully.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('Please enter valid credential..'));
        }
        $this->set(compact('user'));
    }

    public function logout()
    {
        $session = $this->request->getSession(); //read session data
        // $this->$session->delete();
        $session->destroy();
        return $this->redirect(['action' => 'login']);
    }

    public function forgot()
    {
        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $user->email = $email;
            $token = rand(10000, 100000);

            $result = $this->Users->checkMailExist($email, $token);
            // die($result);
            if ($result) {

                $mailer = new Mailer('default');
                $mailer->setTransport('gmail'); //your email configuration name
                $mailer->setFrom(['rkteqm@gmail.com' => 'Code The Pixel']);
                $mailer->setTo($email);
                $mailer->setEmailFormat('html');
                $mailer->setSubject('Verify New Account');
                $mailer->deliver('<a href="http://localhost:8765/users/reset?token=' . $token . '">Click here</a>');

                $this->Flash->success(__('Reset email send successfully.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Please enter valid credential..'));
        }
        $this->set(compact('user'));
    }

    public function reset()
    {

        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        $token = $_REQUEST['token'];
        $result = $this->Users->checktokenexist($token);
        if ($result) {
            if ($this->request->is('post')) {
                $password = $this->request->getData('password');
                $res = $this->Users->resetPassword($token, $password);
                // die($res);
                if ($res) {
                    $this->Flash->success(__('Password updated successfully.'));
                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('Please enter valid password'));
            }
        } else {
            return $this->redirect(['action' => 'login']);
        }

        $this->set(compact('user'));
    }

    public function sendMail()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            // $userTable = TableRegistry::get('Users');
            $name = $this->request->getData('name');
            $email = $this->request->getData('email');
            // $user = $userTable->newEntity($this->request->getData());
            // if ($userTable->save($user)) {
            $user->name = $name;
            $user->email = $email;

            $mailer = new Mailer('default');
            $mailer->setTransport('smtp'); //your email configuration name
            $mailer->setFrom(['noreply[at]codethep!xel.com' => 'Code The Pixel']);
            $mailer->setTo($email);
            $mailer->setEmailFormat('html');
            $mailer->setSubject('Verify New Account');
            $mailer->deliver('Hi $name<br/>Welcome to Code The Pixel.');

            $this->Flash->success(__('Your account has been registered.'));
            return $this->redirect(['action' => 'index']);
            // } else {
            //     $this->Flash->error(__('Registration failed, please try again.'));
            // }
        }
        $this->set(compact('user'));
    }

    public function list()
    {
        $session = $this->request->getSession(); //read session data
        if ($session->read('email') != null) {
        } else {
            $this->redirect(['action' => 'login']);
        }

        $this->viewBuilder()->setLayout('mydefault');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function home()
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

    public function myedit($id = null)
    {
        $session = $this->request->getSession(); //read session data
        if ($session->read('email') != null) {
        } else {
            $this->redirect(['action' => 'login']);
        }
        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'list']);
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
        $this->request->allowMethod(['post', 'mydelete']);
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
