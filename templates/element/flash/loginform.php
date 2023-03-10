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
                <h1 class="heading mt-3"><?= __('Please Login Here') ?></h1>
            </div>
        </aside>
        <div class="container">
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <span class="error-message" id="email-error"></span>
                            <?= $this->Form->control('email', ['required' => false]) ?>
                        </div>
                        <div class="col-md-6">
                            <span class="error-message" id="password-error"></span>
                            <?= $this->Form->control('password', ['required' => false]) ?>
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
                <hr>
                <div class="text-center">
                    <a class="small" href=""> <?= $this->Html->link(__('Forgot Password?'), ['action' => 'forgot'], ['class' => 'nav-link active']) ?></a>
                </div>
                <div class="text-center">
                    <a class="small" href=""> <?= $this->Html->link(__('Create an Account!'), ['action' => 'signup'], ['class' => 'nav-link active']) ?></a>
                </div>
            </div>
        </div>
    </div>
</div>