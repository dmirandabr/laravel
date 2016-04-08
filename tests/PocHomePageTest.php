<?php

class PocHomePageTest extends TestCase
{
    
    public function test_it_should_display_a_homepage()
    {
        $this->visit('/');
        $this->see('WELCOME TO BANKRATE');
    }

}
