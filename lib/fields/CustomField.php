<?php

namespace UCommWPGQLBoilerplate\Fields;

class CustomField implements FieldInterface {

  protected $typeName;
  protected $fieldName;

  public function __construct(string $typeName, string $fieldName)
  {
    $this->typeName = $typeName;
    $this->fieldName = $fieldName;  
  }

  public function registerField()
  {
    register_graphql_field($this->typeName, $this->fieldName, $this->setConfig());
  }

  protected function setConfig(): array {
    return [];
  }

}