<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- <?= $this->Html->script('script') ?> -->

<div class="container">
    <div class="row">
        <aside class="column">
            <div class="" style="text-align:center;">
                <h1 class="heading mt-3"><?= __('Please Signup Here') ?></h1>
            </div>
        </aside>
        <div class="container">
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
                                    ['Male' => 'Male', 'Female' => 'Female'],
                                    ['required' => false]
                                ) ?>
                            </div>
                            <?php
                            if ($this->Form->isFieldError('gender')) {
                                echo $this->Form->error('gender', 'Please select your Gender');
                            }
                            ?>
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>