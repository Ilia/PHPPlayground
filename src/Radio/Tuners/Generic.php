<?php 
namespace Radio\Tuners;

use Radio\TunerInterface;

class Generic implements TunerInterface 
{
    protected $name;
    protected $frequency;

    function __construct($name, $frequency){
        $this->name = $name;
        $this->frequency = $frequency;
    }

    public function __get($name){
      return $this->$name;
    }
}