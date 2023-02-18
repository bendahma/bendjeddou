<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Client;
use App\Manager;
use App\Order;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [] ;

    public function username(){
       return 'username';
    }

    public function isAdmin(){
       return auth()->user()->role == 'admin' ? true : false ;
    }

}
