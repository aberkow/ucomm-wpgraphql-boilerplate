<?php

namespace UCommWPGQLBoilerplate\Connections;

interface ConnectionInterface
{
  /**
   * Make a connection between a Type and the appropriate root.
   *
   * @return void
   */
  public function registerConnection();
}
