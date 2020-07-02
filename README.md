# WPGraphQL Boilerplate Extension Plugin

**This is a work in progress. Definitely don't use it yet.**

## Usage

### Initial installation
```
$ composer install
$ docker-compose up
```

### WordPress Activation
Activate the wp-graphql plugin and this one at the same time

### Creating new types
For now, add types, fields, and connections to their appropriate files in `/lib/data`. Make sure to `require` those files in `ucomm-wpgraphql-boilerplate.php`. I may change this to some kind of autoloader in the future.


## TODO
- create an autoloader to require files. possibly as part of the `XRegister` classes
- maybe create a `Register` interface or parent class. depends on how I structure the rest of the API
- look for ways to optimize the data files and how they interact with the registers. probably this will require recursion
- see if I can make some of the class methods `protected` or `private`
- add a way to give an example of a mutation
