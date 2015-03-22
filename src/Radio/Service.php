<?php

namespace Radio;

class Service
{
  private $tuner;
 
  private $name;

  public function setTuner(\Radio\Adapter $adapter, \Radio\AbstractTuner $tuner){
    if(!in_array($tuner, $adapter->tuners)){
      throw new \Radio\Exceptions\NotFoundTunerException;
    }

    $this->tuner = $tuner;
  }

  public function tuner(){
    return $this->tuner;
  }

  public function setName($name){
    return $this->name = $name;
  }

  public function name(){
    return $this->$name;
  }

  public function __toString(){
    if (isset($this->tuner)){
      return "Tuned to \"{$this->tuner->name()}\" [{$this->tuner->frequency()} kHz]";
    }
  }
}