<?php

namespace UCommWPGQLBoilerplate\Types\MyType;

use UCommWPGQLBoilerplate\Types\CustomType;

class MySubType extends CustomType
{
  public function __construct(string $type)
  {
    parent::__construct($type);
  }

  public function getConfig(): array
  {
    return [
      'description' => 'Test Sub Type',
      'fields' => [
        'job' => [
          'type' => 'String',
          'description' => 'A job'
        ],
        'experience' => [
          'type' => 'String',
          'description' => 'Experience Level'
        ]
      ]
    ];
  }
}
