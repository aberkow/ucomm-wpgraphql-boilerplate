<?php

namespace UCommWPGQLBoilerplate\Fields;

class FieldRegister {
  public function __construct()
  {

  }

  public function setFields(array $fieldsConfig = []): array {
    // if there is no field config array, get it from the data directory
    if (count($fieldsConfig) === 0) {
      $fieldsConfig = include BGQLE_DIR . '/lib/data/fields.php';
    }

    // right now this will only work for a flat array of namespaces. it might need to be made recursive somehow.
    return array_map(function($namespace, $configurations) {
      $registeredClasses = [];
      foreach ($configurations as $config) {
        $registered = $this->createRegistry($namespace, $config);
        $registeredClasses[] = $registered;
      }

      // return the resolved class to keep track of it.
      return $registeredClasses;
    }, array_keys($fieldsConfig), $fieldsConfig);
  }

  public function createRegistry($namespace, $config)
  {
    // create a class name for every namespace and field
    $class = $namespace . $config['className'];

    // resolve a new class from from the class name
    // use the connection and fieldName properties as constructor arguments
    $resolved = new $class($config['connection'], $config['fieldName']);

    // register the field type using the resolved class in a closure
    add_action('graphql_register_types', function () use ($resolved) {
      $resolved->registerField();
    });

    return $resolved;
  }
}