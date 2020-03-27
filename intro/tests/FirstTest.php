<?php

class FirstTest extends PHPUnit\Framework\TestCase
{
    function testFirstAssertion()
    {
        $this->assertTrue(false);
    }
    function secondAssertion()
    {
        $this->assertTrue(true);
    }
    /** @test */
    function thirdAssertion()
    {
        $this->assertTrue(true);
    }
}