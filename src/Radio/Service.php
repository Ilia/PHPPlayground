<?php

namespace Radio;



class Service
{
  protected $selected_tuner;
 
  public function setTuner($adapter, $tuner){
    if ($adapter instanceof \Radio\Adapter) {
      foreach($adapter->tuners as $adapter_tuner){
        if ("Radio\Tuners\\" . $tuner === get_class($adapter_tuner)){
          $this->selected_tuner = $adapter_tuner;
          return;
        }
      }
      throw new \Radio\Exceptions\NotFoundTunerException;
    } else {
      throw new \Radio\Exceptions\AdapterException("Not adapter");
    }
  }

  public function __toString(){
    if (isset($this->selected_tuner)){
      return "Tuned to \"{$this->selected_tuner->name}\" [{$this->selected_tuner->frequency} kHz]";
    }
  }
}