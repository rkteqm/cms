<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

use function PHPSTORM_META\type;

$this->Breadcrumbs->add(
    'Login',
    ['controller' => 'Users', 'action' => 'login']
);
$this->Breadcrumbs->add(
    'List',
    ['controller' => 'Users', 'action' => 'list']
);
?>
<div class="container">
    <?= $this->Form->create($user, ["enctype" => "multipart/form-data"]) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>

        <?= $this->Html->link(__('Back'), ['action' => 'list'], ['class' => 'nav-link active']) ?>

        <div class="row">
            <div class="col-md-3">
                <?= $this->Form->control('file', ['type' => 'file', 'required' => false]) ?>
                <span class="error-message" id="file-name-error"></span>
            </div>
            <div class="col-md-3">
                <td><?= $this->Html->image(h($user->file), array('width'=>'200px')) ?></td>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('first_name') ?>
                <span class="error-message" id="first-name-error"></span>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('last_name') ?>
                <span class="error-message" id="last-name-error"></span>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('email', ['required' => false, 'type' => 'text']) ?>
                <span class="error-message" id="email-error"></span>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('phone_number') ?>
                <span class="error-message" id="phone-number-error"></span>
            </div>
            <div class="col-md-6">
                <label for="gender">Gender</label>
                <div class="rahul">
                    <?= $this->Form->radio(
                        'gender',
                        ['Male' => 'Male', 'Female' => 'Female']
                    ) ?>
                </div>
                <span class="error-message" id="gender-error"></span>
            </div>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>