<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;



class Usuario extends RModel implements Authenticatable
{

    protected $table = 'usuarios';

    protected $fillable = ['email', 'login', 'senha', 'nome'];


    public function getAuthIdentifierName()
    {
        return $this->getKey();
    }

    public function getAuthIdentifier()
    {
        return $this->login;
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        // no implementation
    }

    public function getRememberTokenName()
   {

   }

}
