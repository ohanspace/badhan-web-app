<?php

namespace App\Accounts;


class UserCreator
{
    protected $users;

    protected $confirmation;

    public function __construct(UserRepository $users, SendConfirmationSMS $confirmation){
        $this->users = $users;
        $this->confirmation = $confirmation;
    }

    public function create(UserCreatorListener $listener, $data, $validator = null){
        //TODO
    }
}