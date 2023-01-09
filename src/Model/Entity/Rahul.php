<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Rahul extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}