<?php
namespace Codeception\Module;
use Laracasts\TestDummy\Factory as TestDummy;
// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{
    public function signIn(){
        $this->haveAnAccount(['username'=>'Foobar','email'=>'foo@example.com','password'=>'secret']);
        $I = $this->getModule('Laravel4');
        $I->amOnPage('/login');
        $I->fillField('email','foo@example.com');
        $I->fillField('password','secret');
        $I->click('Sign In');
    }
    public function postAStatus($body){
//        $this->have('Larabook\Statuses\Status');
        $I = $this->getModule('Laravel4');
        $I->fillField('Status', $body);
        $I->click('Post Status');
    }
    public function have($model,$overrides = []){
        TestDummy::create($model, $overrides);
    }
    public function haveAnAccount($overrides=[]){

    $this->have('Larabook\Users\User', $overrides);
}

}