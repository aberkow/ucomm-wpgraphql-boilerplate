<?php

namespace UCommWPGQLBoilerplate\Types;

use UCommWPGQLBoilerplate\Types\CustomType;

class MyType extends CustomType {
  public function __construct(string $type)
  {
    parent::__construct($type);
  }

  public function getConfig(): array
  {
    return [
      'description' => 'Test Type',
      'fields' => [
        'name' => [
          'type' => 'String',
          'description' => 'A name'
        ],
        'age' => [
          'type' => 'Int',
          'description' => 'An age'
        ]
      ]
    ];
  }

  // public function registerType()
  // {
  //   parent::registerType();
  // }
}