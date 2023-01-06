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
<?= $this->element('flash/edit') ?>