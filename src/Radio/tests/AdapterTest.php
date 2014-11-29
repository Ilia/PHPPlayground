<?php

use Radio\Adapter;
use Radio\Tuners\Generic;

class AdapterTest extends PHPUnit_Framework_TestCase
{
    protected $adapter = null;

    protected function setUp() {
        $this->adapter = new Adapter('Hello');
    }

    public function testName() {   
        $this->assertEquals("Hello", $this->adapter->name);
    }

    public function testAddTuner() {
        $this->adapter->addTuner(new Generic('Tuner1', 1234));

        $this->assertCount(1, $this->adapter->tuners);
    }

    protected function tearDown() {
        unset($this->adapter);
    }
}
?>