<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<?= $this->element('flash/header') ?>
<?= $this->Html->css(['user', 'normalize.min', 'milligram.min', 'cake']) ?>
<!-- <?= $this->Html->script('script') ?> -->
<?= $this->element('flash/navbar') ?>
<div class="rahul">
    <?= $this->Breadcrumbs->render() ?>
</div>
<div class="container-fluid">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</div>

<?= $this->element('flash/footer') ?>