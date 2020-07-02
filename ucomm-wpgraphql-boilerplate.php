<?php
/*
Plugin Name: WPGraphQL Extension Boilerplate
Description: An attempt at a boilerplate plugin to integrate with WPGraphQL
Author: UComm Web Team/Adam Berkowitz
Version: 0.0.1
Text Domain: ucomm-wpgql-boilerplate
*/

// use UCommWPGQLBoilerplate\Fields\MyField;

use UCommWPGQLBoilerplate\Connections\MyConnection;
use UCommWPGQLBoilerplate\Fields\FieldRegister;
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

require 'lib/types/CustomTypeInterface.php';
require 'lib/types/CustomType.php';
require 'lib/types/TypeRegister.php';
require 'lib/types/MyType.php';

require 'lib/fields/FieldInterface.php';
require 'lib/fields/CustomField.php';
require 'lib/fields/MyField.php';
require 'lib/fields/FieldRegister.php';

require 'lib/connections/ConnectionInterface.php';
require 'lib/connections/CustomConnection.php';
require 'lib/connections/MyConnection.php';


$type_register = new TypeRegister();
$preparedTypes = $type_register->setTypes();
if (count($preparedTypes) > 0) {
  $type_register->createRegistry();
}

$field_register = new FieldRegister();
$field_register->setFields();

$my_connection = new MyConnection('RootQuery', 'MyType', 'myConnections');

add_action('graphql_register_types', function() use ($my_connection) {
  $my_connection->registerConnection();
});


