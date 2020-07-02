<?php

namespace UCommWPGQLBoilerplate\Connections;

class ConnectionRegister {
  public function setConnections(array $connectionsConfig = []) {
    if (count($connectionsConfig) === 0) {
      $connectionsConfig = include BGQLE_DIR . '/lib/data/connections.php';
    }
  

    array_map(function($namespace, $configurations) {
      $registeredClasses = [];
      foreach ($configurations as $config) {
        echo "<pre>";
        var_dump($config);
        echo "</pre>";
      }
    }, array_keys($connectionsConfig), $connectionsConfig);



  }

  public function createRegistry($namespace, $config) {
    $class = $namespace . $config['fromType'];

    $resolved = new $class($config['fromType'], $config['toType'], $config['fieldName']);

    add_action('graphql_register_types', function() use ($resolved) {
      $resolved->registerConnection();
    })

  }
}