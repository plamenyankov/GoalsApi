<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('see my goals');
$I->amOnPage('/#/goals');
$I->click('Add Goal');