<?php
/*
Plugin Name: WPGraphQL Extension Boilerplate
Description: An attempt at a boilerplate plugin to integrate with WPGraphQL
Author: UComm Web Team/Adam Berkowitz
Version: 0.0.1
Text Domain: ucomm-wpgql-boilerplate
*/

// use UCommWPGQLBoilerplate\Fields\MyField;
use UCommWPGQLBoilerplate\Types\MyType;
use UCommWPGQLBoilerplate\Types\TypeRegister;

if (!defined('WPINC')) {
  die;
}

define('BGQLE_DIR', plugin_dir_path(__FILE__));
define('BGQLE_URL', plugins_url('/', __FILE__));

// select the right composer autoload.php file depending on environment.
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
  require_once(dirname(ABSPATH) . '/vendor/autoload.php');
} elseif (file_exists(ABSPATH . 'vendor/autoload.php')) {
  require_once(ABSPATH . 'vendor/autoload.php');
} else {
  require_once('vendor/autoload.php');
}

require 'lib/types/MyType.php';

require 'lib/fields/MyField.php';

$my_type = new MyType('MyType');

$types = [
  $my_type,
];


$type_register = new TypeRegister();
$types_set = $type_register->setTypes($types);
if ($types_set) {
  $type_register->createRegistry();
}

// $my_field = new MyField('RootQuery', 'myField');

// $fields_register = new FieldRegister();
// $fields_set = $fields_register->setFields([ $my_field ]);
// if ($fields_set) {
//   $fields_register->createFields();
// }

