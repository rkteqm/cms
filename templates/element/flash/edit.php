<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
        ?>
        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->control('first_name') ?>
                <span class="error-message" id="first-name-error"></span>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('last_name') ?>
                <span class="error-message" id="last-name-error"></span>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('email') ?>
                <span class="error-message" id="email-error"></span>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('phone_number') ?>
                <span class="error-message" id="phone-number-error"></span>
            </div>
            <div class="col-md-6">
                <?= $this->Form->control('password') ?>
                <span class="error-message" id="password-error"></span>
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