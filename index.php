<?php
require 'vendor/autoload.php';

use Radio\Adapter;
use Radio\Tuners\Generic;
use Monolog\Logger;

$log = new Logger('TunerService');

$adapter = new Adapter("adapter0");
$adapter->addTuner(new Generic("tuner0", 1234));
$adapter->addTuner(new \Radio\Tuners\DAB("tuner1", 1234, ['service1', 'service2']));

try{
  $service = new \Radio\Service;
  $service->setTuner($adapter, 'DAB');
  $log->debug($service);
} catch(\Radio\Exceptions\AdapterException $e) {     
  $log->error($e->getMessage());
} catch(\Radio\Exceptions\NotFoundTunerException $e){
  $log->error($e->getMessage());
}
?>
