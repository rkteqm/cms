<?php

use Phinx\Db\Action\Action;

$session = $this->request->getSession(); //read session data
// echo $session->read('email');
if ($session->read('email') != null) {
    // echo "rahul";
} else {
    $this->redirect(['action' => 'login']);
}
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1 ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= h($user->first_name) ?></td>
                        <td><?= h($user->last_name) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->phone_number) ?></td>
                        <td><?= h($user->gender) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__(''), ['action' => 'myview', $user->id], ['class' => 'fa-solid fa-eye']) ?>
                            <?= $this->Html->link(__(''), ['action' => 'myedit', $user->id], ['class' => 'fa-solid fa-pen-to-square']) ?>
                            <?= $this->Form->postLink(__(''), ['action' => 'mydelete', $user->id], ['class' => 'fa-solid fa-trash'], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>