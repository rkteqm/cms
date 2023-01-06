<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column-responsive column">
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <legend><?= __('Add User') ?></legend>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="error-message" id="first-name-error"></span>
                            <?= $this->Form->control('first_name', ['required' => false]) ?>
                        </div>
                        <div class="col-md-6">
                            <span class="error-message" id="last-name-error"></span>
                            <?= $this->Form->control('last_name', ['required' => false]) ?>
                        </div>
                        <div class="col-md-6">
                            <span class="error-message" id="email-error"></span>
                            <?= $this->Form->control('email', ['required' => false]) ?>
                        </div>
                        <div class="col-md-6">
                            <span class="error-message" id="phone-number-error"></span>
                            <?= $this->Form->control('phone_number', ['required' => false]) ?>
                        </div>
                        <div class="col-md-6">
                            <span class="error-message" id="password-error"></span>
                            <?= $this->Form->control('password', ['required' => false]) ?>
                        </div>
                        <div class="col-md-6">
                            <span class="error-message" id="gender-error"></span>
                            <label for="gender">Gender</label>
                            <div class="rahul">
                                <?= $this->Form->radio(
                                    'gender',
                                    ['Male' => 'Male', 'Female' => 'Female'], ['required' => false]
                                ) ?>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>