<?php

namespace UCommWPGQLBoilerplate\Connections;

class ConnectionRegister {
  public function setConnections(array $connectionsConfig = []) {
    if (count($connectionsConfig) === 0) {
      $connectionsConfig = include BGQLE_DIR . '/lib/data/connections.php';
    }
  
    $test = array_map(function($namespace, $configurations) {
      $registeredClasses = [];
      // echo "<pre>";
      // var_dump($namespace);
      // var_dump($configurations);
      // echo "</pre>";
      foreach ($configurations as $config) {
        $registered = $this->createRegistry($namespace, $config);
        $registeredClasses[] = $registered;
      }
      // echo "<pre>";
      // var_dump($registeredClasses);
      // echo "</pre>";
      return $registeredClasses;
    }, array_keys($connectionsConfig), $connectionsConfig);


    return $test;

  }

  public function createRegistry($namespace, $config) {
    $class = $namespace . $config['className'];

    $resolved = new $class($config['fromType'], $config['toType'], $config['fromFieldName']);

    add_action('graphql_register_types', function() use ($resolved) {
      $resolved->registerConnection();
    });
    return $resolved;
  }
}