<?php

return [
  // the key should match the overall namespace of the types
  'UCommWPGQLBoilerplate\\Types\\' => [
    // type with a class name at the root level of the namespace
    'MyType',
    // for now, create a sub-type by prepending its parent type
    'MyType\\MySubType'
  ],
];
