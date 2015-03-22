<?php 
namespace Radio\Tuners;

use Radio\TunerInterface;
use Radio\AbstractTuner;

class DAB extends AbstractTuner implements TunerInterface
{
    protected $services;

    function __construct($name, $frequency, $services){
       parent::__construct($name, $frequency);

       $this->services = $services;
    }
}