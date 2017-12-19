<?php


class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    }

     public function signeIn(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('email', 'user1@user');
        $I->fillField('password', 'password');
        $I->click('Sign In');
        $I->amOnPage('/Admin_main');
        $I->see('EcommerceAdmin');
        $I->see('Inventory');
        $I->see('Orders');
        $I->see('Items');
        $I->see('Admin users');
    }

    public function CreateItem(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('email', 'user1@user');
        $I->fillField('password', 'password');
        $I->click('Sign In');
        $I->amOnPage('/Admin_main');
        $I->click('#items');
        $I->amOnPage('/Admin_items');
    }
}
