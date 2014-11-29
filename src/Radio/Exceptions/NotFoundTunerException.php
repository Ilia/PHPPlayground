<?php

namespace Radio\Exceptions;

use Exception;

class NotFoundTunerException extends Exception{
  protected $message = "Tuner Not Found!";
}