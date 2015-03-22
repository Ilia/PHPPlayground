<?php
require 'vendor/autoload.php';

use Radio\Adapter;
use Radio\Tuners\Analog;
use Monolog\Logger;

$log = new Logger('TunerService');

$adapter = new Adapter("adapter0");
$tuner1 = new \Radio\Tuners\DAB("tuner1", 1234, ['service1', 'service2']);
$adapter->addTuner(new Analog("tuner0", 1234));
$adapter->addTuner($tuner1);

try{
  $service = new \Radio\Service;
  $service->setTuner($adapter, $tuner1);
  $log->debug($service);
} catch(\Radio\Exceptions\AdapterException $e) {     
  $log->error($e->getMessage());
} catch(\Radio\Exceptions\NotFoundTunerException $e){
  $log->error($e->getMessage());
}
?>
