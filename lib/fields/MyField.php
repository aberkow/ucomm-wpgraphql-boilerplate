<?php

namespace BrochuresGQLExt\Fields;

use WPGraphQLSDK\Fields\CustomField;

class MyField extends CustomField {
  public function __construct(string $typeName, string $fieldName)
  {
    parent::__construct($typeName, $fieldName);
  }

  protected function setConfig(): array
  {
    return [
      'description' => 'My Custom Field',
      'type' => 'MyType',
      'resolve' => function ($root, $args, $context, $info) {
        return 'hello world';
      }
    ];
  }
}