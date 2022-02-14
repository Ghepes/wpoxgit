<?php

require_once __DIR__ . '/WpOxgitTestCase.php';

class ExampleTest extends WpOxgitTestCase
{
    /**
     * @test
     */
    public function false_is_not_true()
    {
        $this->assertNotTrue(false);
    }
}
