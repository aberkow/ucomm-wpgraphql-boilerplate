<?php

namespace UCommWPGQLBoilerplate\Connections;

class MyConnection extends CustomConnection {

  public function __construct(string $fromType, string $toType, string $fromFieldName)
  {
    parent::__construct($fromType, $toType, $fromFieldName);
  }

  protected function getConfig(): array
  {
    return [
      'fromType' => $this->fromType,
      'toType' => $this->toType,
      'fromFieldName' => $this->fromFieldName,
      'connectionArgs' => [
        'name' => [
          'type' => 'String',
          'description' => 'The name to match'
        ],
        'age' => [
          'type' => 'Int',
          'description' => 'The age to match'
        ]
      ],
      'resolve' => function($root, $args, $context, $info) {
        return [
          'nodes' => [
            [
              'name' => 'Adam',
              'age' => 41 
            ],
            [
              'name' => 'Ilana',
              'age' => 43
            ],
          ]
        ];
      }
    ];
  }
}