<?php

return [
  // the key should match the overall namespace of the types
  'UCommWPGQLBoilerplate\\Fields\\' => [
    [
      // the class name to resolve to
      'className' => 'MyField',
      // where to make the connection for the field.
      // the most basic (or root) connection is to the RootQuery
      'connection' => 'RootQuery',
      // the name that will be used/displayed in a graphql playground
      'fieldName' => 'myField',
    ],
    // [
    //   'className' => 'MyField2',
    //   'connection' => 'RootQuery',
    //   'fieldName' => 'myField',
    // ]
  ]
];