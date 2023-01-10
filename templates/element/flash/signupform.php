<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="container">
    <div class="row">
        <aside class="column">
            <div class="" style="text-align:center;">
                <h1 class="heading mt-3"><?= __('Please Signup Here') ?></h1>
            </div>
        </aside>
        <div class="container">
            <div class="users form content">
                <?= $this->Form->create($user, ["enctype" => "multipart/form-data"]) ?>
                <fieldset>
                    <legend><?= __('Add User') ?></legend>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->control('file', ['type' => 'file', 'required' => false]) ?>
                            <span class="error-message" id="file-name-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('first_name', ['required' => false]) ?>
                            <span class="error-message" id="first-name-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('last_name', ['required' => false]) ?>
                            <span class="error-message" id="last-name-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('email', ['required' => false,'type'=>'text']) ?>
                            <span class="error-message" id="email-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('phone_number', ['required' => false]) ?>
                            <span class="error-message" id="phone-number-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('password', ['required' => false]) ?>
                            <span class="error-message" id="password-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('confirm_password', ['type' => 'password', 'required' => false]) ?>
                            <span class="error-message" id="confirm-password-error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="gender">Gender</label>
                            <div class="rahul">
                                <?= $this->Form->radio(
                                    'gender',
                                    ['Male' => 'Male', 'Female' => 'Female'],
                                    ['required' => false]
                                ) ?>
                            </div>
                            <span class="error-message" id="gender-error"></span>
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