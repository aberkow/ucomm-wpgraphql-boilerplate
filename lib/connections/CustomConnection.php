<?php

namespace UCommWPGQLBoilerplate\Connections;

class CustomConnection implements ConnectionInterface
{

  protected $fromType = '';
  protected $toType = '';
  protected $fromFieldName = '';

  public function __construct(string $fromType, string $toType, string $fromFieldName)
  {
    $this->fromType = $fromType;
    $this->toType = $toType;
    $this->fromFieldName = $fromFieldName;
  }

  public function registerConnection()
  {
    register_graphql_connection($this->getConfig());
  }

  public function registerMultipleConnections()
  {
    $connections = $this->getMultipleConfig();
    array_map(function ($connection) {
      register_graphql_connection($connection);
    }, $connections);
  }

  /**
   * Set the config array for each connection.
   *
   * @return array
   */
  protected function getConfig(): array
  {
    return [];
  }

  protected function getMultipleConfig(): array
  {
    return [];
  }
}
