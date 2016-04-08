<?php

class PocRateTableTest extends TestCase
{

    public function test_it_should_display_a_mortgage_rate_table()
    {
        $this->visit('/mortgage');
        $this->see('Mortgage Rates');
    }

}
