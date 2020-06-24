<?php

namespace UCommWPGQLBoilerplate\Types;

/**
 * Base class for registering custom graphql types
 */
class CustomType implements CustomTypeInterface
{
  public $type = '';
  /**
   * Set the type to register
   *
   * @param string $type
   */
  public function __construct(string $type)
  {
    $this->type = $type;
  }

  /**
   * Returns a configuration array for the type
   * https://docs.wpgraphql.com/extending/types/
   *
   * @return array
   */
  public function getConfig(): array
  {
    return [];
  }

  /**
   * Register the new type with the wpgraphql method
   *
   * @return void
   */
  public function registerType()
  {
    $config = $this->getConfig();
    register_graphql_object_type($this->type, $config);
  }

  /**
   * Register the new enum ype with the wpgraphql method
   *
   * @return void
   */
  public function registerEnumType()
  {
    $config = $this->getConfig();
    register_graphql_enum_type($this->type, $config);
  }
}
