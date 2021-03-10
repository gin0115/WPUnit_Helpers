# WPUnit_Helpers
Collection of helper functions, classes and traits for using WPUnit. 

## WP Meta Boxes
Check if meta boxes have been registered correctly, check all values and render the view callback.
```php
$box = (new WP_Meta_Box)
    ->maybe_register()
    ->set_meta_boxes()
    ->find('my_meta_box_key');

$this->assertInstanceOf(Meta_Box_Entity::class, $box);
```
**[Read More](docs/WP_Meta_Box.md)**

## WP Dependencies
Allows for the quick and simple installation of themes and plugins from remote sources.
```php
WP_Dependencies::install_remote_plugin_from_zip(
    'https://the-url.tc/woocommerce.zip', 'path/to/test_wp/root/'
);
```
**[Read More](docs/WP_Dependencies.md)**

## Object (Reflection wrappers)
Reflection is super useful in testing, especially if you cant access internal properties and methods to create your tests. Or you need to mock parts of the process, which are otherwise not accessible (internal WP States etc).
_These also work on static methods/properties_
```php
//  Access protected & privates properties.
Objects::get_property($instnace, 'property');
// Set protected or private properties.
Objects::set_property($instnace, 'property', 'new value');
// Invoke private or protected method.
Objects::invoke_method($instance, 'method', ['the', 'args']);
```
**[Read More](docs/Objects.md)**

## Utils 

## Output
