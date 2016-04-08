<?php

class PocStoryPageTest extends TestCase
{

    public function test_it_should_display_a_story_page()
    {
        $this->visit('/blog/will-card-fraud-increase-at-the-pump');
        $this->see('Will card fraud increase');
    }

}
