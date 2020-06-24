<?php

namespace UCommWPGQLBoilerplate\Types;

/**
 * 
 * interface for custom types related to the CFAR API
 * 
 */
interface CustomTypeInterface
{
  /**
   * Register a new Type to be used with GraphQL.
   * It will self document via the config options.
   *
   * @return void
   */
  public function registerType();

  /**
   * Get the configuration for a Type.
   *
   * @return void
   */
  public function getConfig();
}
