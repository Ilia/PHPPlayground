<?php 
namespace Radio\Tuners;

use Radio\TunerInterface;

class DAB extends Generic implements TunerInterface
{
    protected $services;

    function __construct($name, $frequency, $services){
       parent::__construct($name, $frequency);

       $this->services = $services;
    }
}