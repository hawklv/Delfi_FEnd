<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_data extends Model
{
    public $name;
	public $surname;
	public $email;

    public function __construct($Name,$Surname,$Email)
    {
    	$this->name =  ucfirst($Name);
    	$this->surname = ucfirst($Surname);
    	$this->email = ucfirst($Email);
    }
}

