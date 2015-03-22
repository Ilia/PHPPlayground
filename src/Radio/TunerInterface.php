<?php 
namespace Radio;

interface TunerInterface
{
  
  public function name();

  public function frequency();

  public function setName($name);

  public function setFrequency($frequency);

}