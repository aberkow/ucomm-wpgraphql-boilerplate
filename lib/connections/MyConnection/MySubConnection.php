<?php

namespace UCommWPGQLBoilerplate\Connections\MyConnection;

use UCommWPGQLBoilerplate\Connections\CustomConnection;

class MySubConnection extends CustomConnection {
  public function __construct(string $fromType, string $toType, string $fromFieldName) {
    parent::__construct($fromType, $toType, $fromFieldName);
  }

  protected function getConfig(): array
  {
    return [
      'fromType' => $this->fromType,
      'toType' => $this->toType,
      'fromFieldName' => $this->fromFieldName,
      'resolve' => function($root, $args, $context, $info) {
        return [
          'nodes' => [
            [
              'job' => 'Web Developer',
              'experience' => 'More than some, less than others'
            ]
          ]
        ];
      }
    ];
  }
}