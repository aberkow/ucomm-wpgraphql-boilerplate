<?php

namespace UCommWPGQLBoilerplate\Types;

class TypeRegister
{

  private $types = [];

  public function __construct()
  {

  }

  public function getTypes() {
    return $this->types;
  }

  public function createRegistry() {
    array_map(function($type) {
      $typeName = basename(str_replace('\\', '/', $type));
      $resolved = new $type($typeName);
      add_action('graphql_register_types', function() use ($resolved) {
        $resolved->registerType();
      });
    }, $this->types);
  }

  function setTypes(array $myTypes = [], string $prefix = ''): array
  {

    if (count($myTypes) === 0) {
      $myTypes = include BGQLE_DIR . '/lib/data/types.php';
    }

    $list = [];

    foreach ($myTypes as $i => $type) {
      if (is_array($type)) {
        $list = array_merge($list, $this->setTypes($type, $prefix . $i));
      } else {
        $list[] = $prefix . $type;
      }
    }

    $this->types = $list;
    return $this->types;
  }  
}