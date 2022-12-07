<?php
require '../../vendor/autoload.php';
use Nelmio\Alice\Loader\NativeLoader;

class Dump {
    public $temperature;
    public $wind;
    public $pressure;
    public $humidity;
    public $visibility;
}


$loader = new Nelmio\Alice\Loader\NativeLoader();
$fixtures = $loader->loadFile('resources/fixtures.yml');

?>