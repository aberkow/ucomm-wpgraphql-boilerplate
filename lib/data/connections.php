<?php

return [
  // the key should represent the overall namespace for the connections
  'UCommWPGQLBoilerplate\\Connections\\' => [
    [
      // the class name to resolve to
      'className' => 'MyConnection',
      // we connect 'from' a type in this case the RootQuery...
      'fromType' => 'RootQuery',
      // 'to' a type in this case 'MyType'
      'toType' => 'MyType',
      // this is the name which will appear in a graphql playground
      'fromFieldName' => 'myConnections',
    ],
    // this is an example of a sub-connection. from MyType to MySubType
    [
      'className' => 'MyConnection\\MySubConnection',
      'fromType' => 'MyType',
      'toType' => 'MySubType',
      'fromFieldName' => 'mySubConnection'
    ]
  ]  
];