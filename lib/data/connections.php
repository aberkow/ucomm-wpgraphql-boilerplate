<?php

return [
  'UCommWPGQLBoilerplate\\Connections\\' => [
    [
      'className' => 'MyConnection',
      'fromType' => 'RootQuery',
      'toType' => 'MyType',
      'fromFieldName' => 'myConnections',
    ],
    [
      'className' => 'MyConnection\\MySubConnection',
      'fromType' => 'MyType',
      'toType' => 'MySubType',
      'fromFieldName' => 'mySubConnection'
    ]
  ]  
];