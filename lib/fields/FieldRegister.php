<?php

namespace UCommWPGQLBoilerplate\Fields;

class FieldRegister {
  public function __construct()
  {

  }

  public function registerMyField() {
    (new MyField('RootQuery', 'myField'))->registerField();
  }

  public function setFields(array $myFields = [], string $prefix = ''): array {
    // if there is no field config array, get it from the data directory
    if (count($myFields) === 0) {
      $myFields = include BGQLE_DIR . '/lib/data/fields.php';
    }

    return array_map(function($namespace, $configurations) {

      foreach ($configurations as $config) {
        // create a class name for every namespace and field
        $class = $namespace . $config['className'];
        
        // resolve a new class from from the class name
        // use the connection and fieldName properties as constructor arguments
        $resolved = new $class($config['connection'], $config['fieldName']);

        // register the field type using the resolved class in a closure
        add_action('graphql_register_types', function() use ($resolved) {
          $resolved->registerField();
        });
      }

      // return the resolved class to keep track of it.
      return $resolved;
    }, array_keys($myFields), $myFields);
  }
}