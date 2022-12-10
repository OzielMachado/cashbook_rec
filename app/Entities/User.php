<?php namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity{

    public function setPassword(string $pass){

        $this->attributes['password'] = md5($pass);

        return $this;
    }

}