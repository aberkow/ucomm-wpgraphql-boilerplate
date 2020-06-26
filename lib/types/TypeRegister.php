<?php

namespace UCommWPGQLBoilerplate\Types;

class TypeRegister
{

  private $types = [];

  public function __construct()
  {
    // array_filter(get_class_methods($this), function($method) {
    //   if ($method !== '__construct') {
    //     add_action('graphql_register_types', [$this, $method]);
    //   }
    // });
  }

  public function setTypes($types): bool {
    $this->types = $types;
    return count($this->types) > 0 ? true : false;
  }

  public function getTypes() {
    return $this->types;
  }

  public function createRegistry() {

    array_map(function($type) {
      $class = 'UCommWPGQLBoilerplate\Types\\' . $type;
      $resolved = new $class($type);
      add_action('graphql_register_types', function() use ($resolved) {
        $resolved->registerType();
      });
    }, $this->types);
  }
}