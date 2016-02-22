<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Accounts\User;
use App\Accounts\UserCreator;
use App\Accounts\UserCreatorListener;
use App\Http\Controllers\Controller;
use Input;
use Request;
use Session;
use Validator;


class AuthController extends Controller implements UserCreatorListener
{
    /*
     *  load the signup view
     */
    public function signup(){
        return view('auth.signup');
    }
    /*
     *  handle registration
     */


    public function register(){

        $rules = [
            'telephone' => array('required'),
            'password' => array('required', 'confirmed'),
            //'g-recaptcha-response' => array('required','captcha')
        ];

        //dd(Request::all());
        $validator = Validator::make(Request::all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('signup')
                ->exceptInput('g-recaptcha-response')
                ->withErrors($validator->errors());
        }

        $data = [
            'telephone' => \Input::get('telephone'),
            'password' => \Input::get('password')
        ];

        dump($data);
        $this->userCreator->create($this, $data);

    }


    /**
     * @param $errors
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userValidationError($errors)
    {
        return $this->redirectBack(['errors' => $errors]);
    }

    /**
     * @param \App\Accounts\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userCreated($user)
    {
        Session::forget('githubData');
        Session::put('success', 'Account created. An confirmation code was sent to ' . $user->telephone);

        Auth::login($user, true);

        return $this->redirectIntended(route('home'));
    }

}
