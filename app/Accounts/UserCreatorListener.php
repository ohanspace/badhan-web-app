<?php
namespace App\Accounts;

interface UserCreatorListener
{
    public function userValidationError($errors);
    public function userCreated($user);
}
