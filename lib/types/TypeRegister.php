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
    foreach ($this->types as $type) {
      // echo "<pre>";
      // var_dump(get_class_methods(get_class($type)));
      // var_dump($type);
      // echo "</pre>";
      // $class = get_class($type);
      // echo "<pre>";
      // var_dump($class::registerType());
      // echo "</pre>";
      add_action('graphql_register_types', $type->registerType());
    }
    // array_map(function($type) {
    // }, $this->types);
  }
}