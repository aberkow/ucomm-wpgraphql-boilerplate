<?php

namespace UCommWPGQLBoilerplate\Fields;

class FieldRegister {
  public function __construct()
  {
    array_filter(get_class_methods($this), function ($method) {
      if ($method !== '__construct') {
        add_action('graphql_register_types', [$this, $method], 99);
      }
    });
  }

  public function registerMyField() {
    (new MyField('RootQuery', 'myField'))->registerField();
  }
}