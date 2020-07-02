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
        $nodes = [];

        if ($root['name'] === 'Adam') {
          $nodes = [
            'job' => 'Web Developer',
            'experience' => 'More than some, less than others'
          ];
        } else if ($root['name'] === 'Ilana') {
          $nodes = [
            'job' => 'Rabbi',
            'experience' => 'SOOO MUCH!!!!'
          ];
        }

        return [
          'nodes' => [ $nodes ]
        ];
      }
    ];
  }
}