<?php 
namespace Radio;

abstract class AbstractTuner{

  protected $name;
  protected $frequency;

  function __construct($name, $frequency){
    $this->setName($name);
    $this->setFrequency($frequency);
  }

  public function name(){
    return $this->name;
  }

  public function frequency(){
    return $this->frequency;
  }

  public function setFrequency($frequency){
    $this->frequency = $frequency;
  }

  public function setName($name){
    $this->name = $name;
  }
}