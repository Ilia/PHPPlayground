<?php

use \Radio\Service;
use \Radio\Adapter;
use \Radio\Tuners\Generic;

class ServiceTest extends PHPUnit_Framework_TestCase 
{
    protected $service;
    protected $adapter;

    protected function setUp() {
        $this->service = new Service;
        $this->adapter = new Adapter("adapter0");
        $this->adapter->addTuner(new Generic("tuner0", 1234));
    }

    public function testSelectTunerSuccess() {
        $this->service->setTuner($this->adapter, 'Generic');
        $this->assertInstanceOf('\Radio\Tuners\Generic', $this->service->selected_tuner); 
    }

    public function testAddAdapterFailure() {
      $this->setExpectedException('Radio\Exceptions\AdapterException');

      try {
          $this->service->setTuner(new stdClass, 'Generic');
      } catch (Radio\Exceptions\AdapterException $e) {
          $this->assertContains("Not adapter", $e->getMessage());
          throw $e;
      }
    }

    public function testSelectTunerFailure() {
      $this->setExpectedException('Radio\Exceptions\NotFoundTunerException');

      try {
          $this->service->setTuner($this->adapter, 'Generic1234');
      } catch (Radio\Exceptions\NotFoundTunerException $e) {
          $this->assertContains("Tuner Not Found!", $e->getMessage());
          throw $e;
      }
    }

    protected function tearDown(){
        unset($this->service);
        unset($this->adapter);
    }
}