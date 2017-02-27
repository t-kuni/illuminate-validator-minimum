<?php
require_once __DIR__ . "/vendor/autoload.php";

// use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator;
use Illuminate\Translation\Translator;
use Illuminate\Translation\LoaderInterface;

echo "aaaa";

$data = [
  'name' => 'aaa',
];

$rules = [
    'name' => join([
    "required",
    "string",
    "max:255",
    "regex:/^[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]$/",
    ], '|'),
 ];

class DummyLoader implements LoaderInterface {
  public function load($locale, $group, $namespace = null) {
    echo "load";
  }
  public function addNamespace($namespace, $hint){
    echo "addNamespace";
  }
  public function namespaces(){
    echo "namespaces";
  }
}

$l = new DummyLoader();
$t = new Translator($l, 'ja');
$v = new Validator($t, $data, $rules);
$v->validate();
