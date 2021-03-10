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
**[Show Docs](../docs/WP_Meta_Box.md)**

## WP Dependencies

## Object (Reflection wrappers)

## Utils 

## Output
