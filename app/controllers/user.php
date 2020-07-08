<?php

namespace Controllers;

use Models\User;
use \Infinitypaul\Validator\Validator;
/* 


$validator = new Validator([
    'full_name' => 'juan',
    'email' => 'el coso'
]);
$validator->setRules([
    'full_name' => ['required'],
    'email' => ['email']
]);
if(!$validator->validate()){
    var_dump($validator->getErrors());
}else {
    var_dump('Passed');
}
*/

class Users{

    public static function create_user($username,$email,$password){

        $error = true;

        $validator = new Validator([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);
        $validator->setRules([
            'username' => ['required'],
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if($validator->validate()) {
            $user = User::create(['username' => $username, 'email' => $email, 'password' => $password]);
            return $user;
        } else {
            return $error;
        }
      
    }

}