# WPUnit_Helpers
Collection of helper functions, classes and traits for using WPUnit. 

## Meta Box Inspector
Check if meta boxes have been registered correctly, check all values and render the view callback.
```php
$box = Meta_Box_Inspector::initialise()->find('my_meta_box_key');
$this->assertInstanceOf(Meta_Box_Entity::class, $box);
$this->assertEquals('My Title', $box->title);
```
**[Read More](docs/Meta_Box_Inspector.md)**

## Menu Page Inspector
Allows for the checking of added pages and sub pages. Can be searched to ensure pages are added as expected and can render the pages content, for intergration style tests. Allows for testing parent and child(sub) pages.
```php
$page = Menu_Page_Inspector::initialise()->find_parent_page('parent_page_slug');
$this->assertInstanceOf(Menu_Page_Entity::class, $box);
$this->assertEquals('My Settings', $page->menu_title);
```
**[Read More](docs/Menu_Page_Inspector.md)**

## WP Dependencies
Allows for the quick and simple installation of themes and plugins from remote sources.
```php
WP_Dependencies::install_remote_plugin_from_zip(
    'https://the-url.tc/woocommerce.zip', 'path/to/test_wp/root/'
);
WP_Dependencies::activate_plugin('woocommerce/woocommerce.php');
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
A collection of functions that have no other real place.
```php 
// array_map_with allows array_map to be done with access to the key and as many other
// values you wish to pass.
$result = Utils::array_map_with( 
    function($key, $value, $spacer){
        return $key . $spacer . $value;
    }, 
    ['key1'=>'value1', 'key2' => 'value2'],
    ' -|- '
);
var_dump($result); // ['key1 -|- value1', 'key2 -|- value2']
```
**[Read More](docs/Utils.md)**

## Output
