<?php

namespace Radio;

class Adapter
{
     private $name;
     private $tuners = Array();

     function __construct($name){
         $this->name = $name;
     }

     public function __get($name){
        return $this->$name;
     }

     public function addTuner($tuner){

        if ($tuner instanceof TunerInterface){
            $this->tuners[] = $tuner;
        }
     }
}
    
