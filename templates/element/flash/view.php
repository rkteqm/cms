<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->Breadcrumbs->add(
    'Login',
    ['controller' => 'Users', 'action' => 'login']
);
$this->Breadcrumbs->add(
    'List',
    ['controller' => 'Users', 'action' => 'list']
);
?>
<div class="row">
    <div class="container">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <?php
            $session = $this->request->getSession(); //read session data
            if ($session->read('email') != null) {
            ?>
                <?= $this->Html->link(__('Back'), ['action' => 'list'], ['class' => 'nav-link active']) ?>

            <?php
            } else {
            ?>
                <?= $this->Html->link(__('Back'), ['action' => 'home'], ['class' => 'nav-link active']) ?>
            <?php
            }
            ?>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($user->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($user->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($user->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Date') ?></th>
                    <td><?= h($user->created_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= $this->Number->format($user->phone_number) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>