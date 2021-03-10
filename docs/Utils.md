# Utils

A collection of assorted functions which do not really have a single place to live.

> All methods in this helper class are self contained and called in via static methods.

## array_map_with()

```php
/**
 * Array map, which gives access to array key and a selection of static
 * values.
 *
 * @param callable $function
 * @param iterable<mixed> $data
 * @param mixed ...$with
 * @return array<int, mixed>
 */
public static function array_map_with( callable $function, iterable $data, ...$with ): array
```
As this uses a foreach loop at its heart, any iterable can be used although care should be taken as the key isnt returned from an iterator unless ```yield 'key'=>'value';``` is used
```php

$my_data = [ 'user_12342' => 'Matt Smith', 'user_23423' => 'Sally Jones' ];
$logged_in_user = 'user_12';
$banned_users = ['user_12342', 'another_key'];

$mapped = Utils::array_map_with(
    function($user_id, $user_name, $admin_user, $banned_users): string {        
        $user = new stdClass();
        $user->name = $user_name;
        $user->banned = in_array($user_id, $banned_users, true);
        $user->processed_by = $admin_user;
        return $user;
    }, 
    $my_data, $static_value, $banned_users 
);

// Can also be used with a generator.
$generator = function(): Generator {
    yield 'user_12342' => 'Matt Smith';
    yield 'user_23423' => 'Sally Jones';
    yield 'user_12432' => 'Joe Nobody';
};

$mapped = Utils::array_map_with(
    function($user_id, $user_name, $admin_user, $banned_users): string {...}, 
    $generator(), $static_value, $banned_users 
);
```

> The static parameters are not required, so this can be used as an array_map which gives access to both key and value.

```php 
Utils::array_map_with( function($key, $value){...}, $array );
```

