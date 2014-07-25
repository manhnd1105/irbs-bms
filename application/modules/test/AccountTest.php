<?php

/**
 * Created by PhpStorm.
 * User: dell
 * Date: 6/25/14
 * Time: 11:40 AM
 */
//Class name must follow Camel Rule and have suffix 'Test'
class AccountTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function test_true()
    {
        $foo = false;
        $this->assertTrue($foo);
    }
}