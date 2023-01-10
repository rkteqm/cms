<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\TableRegistry;


/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->requirePresence('first_name', 'create')
            ->add('first_name', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter your first name',
                    'last' => true
                ],
                'characters' => [
                    'rule'    => ['custom', '/^[A-Z]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter characters only.'
                ],
                'length' => [
                    'rule' => ['minLength', 2],
                    'last' => true,
                    'message' => 'First Name need to be at least 2 characters long',
                ],
            ]);

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->requirePresence('last_name', 'create')
            ->add('last_name', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter your last name',
                    'last' => true
                ],
                'characters' => [
                    'rule'    => ['custom', '/^[A-Z]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter characters only.'
                ],
                'length' => [
                    'rule' => ['minLength', 2],
                    'last' => true,
                    'message' => 'Last Name need to be at least 2 characters long',
                ],
            ]);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email', 'Please enter your email')
            ->add('email', 'unique', [
                'rule' => 'validateUnique', 'provider' => 'table',
                'message' => 'Email already exist please enter another email',
            ]);

        $validator
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number', 'Please enter your phone number')
            ->add('phone_number', [
                'numeric' => [
                    'rule' => 'numeric',
                    'message' => 'Please enter numeric only',
                    'last' => true,
                ],
                'minLength' => [
                    'rule' => ['minLength', 10],
                    'last' => true,
                    'message' => 'Phone Number need to be 10 characters long',
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 10],
                    'last' => true,
                    'message' => 'Phone Number need to be 10 characters long',
                ]
            ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->add('password', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter your password',
                    'last' => true
                ],
                'password' => [
                    'rule' => array('custom', '(^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]*).{8,}$)'),
                    'message' => 'password should contain alteast 8 digits, 1 Special Character, 1 number, 1 uppercase, 1 lowercase'
                ]
            ]);

        $validator
            ->scalar('confirm_password')
            ->maxLength('confirm_password', 255)
            ->requirePresence('confirm_password', 'create')
            ->add('confirm_password', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter your confirm-password',
                    'last' => true,
                ],
                'confirm_password' => [
                    'rule' => array('custom', '(^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]*).{8,}$)'),
                    'last' => true,
                    'message' => 'confirm password should contain alteast 8 digits, 1 Special Character, one number, 1 uppercase, 1 lowercase '
                ],
                'match' => [
                    'rule' => array('compareWith', 'password'),
                    'last' => true,
                    'message' => 'Password should not match with the previous password'
                ]
            ]);

        $validator
            ->scalar('gender')
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->scalar('file')
            ->requirePresence('file', 'create')
            ->notEmptyFile('file', 'Please select your file');
        // ->add('file', [
        //     'validExtension' => [
        //         'rule' => ['extension', ['png']], // default  ['gif', 'jpeg', 'png', 'jpg']
        //         'message' => 'These files extension are allowed: png'
        //     ],
        //     'validSize' => [
        //         'rule' => ['fileSize', '<=', '1MB'],
        //         'message' => 'These files greater than 1 mb'
        //     ],

        // ]);


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }

    public function login($email, $password)
    {
        $result = $this->find('all')->where(['email' => $email, 'password' => $password])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function resetPassword($token, $password)
    {
        $users = TableRegistry::get("Users");
        $query = $users->query();
        $result = $query->update()
            ->set(['password' => $password, 'token' => ''])
            ->where(['token' => $token])
            ->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checktokenexist($token)
    {
        $result = $this->find('all')->where(['token' => $token])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checkMailExist($email, $token)
    {
        $users = TableRegistry::get("Users");
        $query = $users->query();
        $result = $query->update()
            ->set(['token' => $token])
            ->where(['email' => $email])
            ->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
