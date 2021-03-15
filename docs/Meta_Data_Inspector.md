# Menu_Data_Inspector

The Meta Data inspector gives you quick and easy access to all pre registered meta data. This includes Post, Term, User, Comment and any custom types defined.

## Setup

To create the inspector, its jsut a case of letting all your meta be registered. either by calling your action they are hooked into or just activating your plugin in the test bootstrap.

``` php
$inspector = new Meta_Data_Inspector;
$inspector->set_registered_meta_data(); 
//or 
$inspector = Meta_Data_Inspector::initialise();
```

**You can repopulate the internal state of the inspector from the globals by calling**
```php
$inspetor = $inspector->set_registered_meta_data(true);
```
*This will rebuild the internal state of the inspector. WP Will not included your meta again, so you dont need to clear the internal state before running.*

** Post Types
The most common form of meta used in WP is post meta. The Inspector will allow you to check if a meta key has been registered against a post type and to get all meta fields registered for any post type.


### find_post_meta(string $post_type, string $meta_key): ? Meta_Data_Entity
```php 
// Find based on  meta key
$inspector = Meta_Data_Inspector::initialise();
$found = $inspector->find_post_meta('post', 'my_meta_box_by_id');
var_dump($found); // Either instance of Meta_Data_Entity or null if not found.
$this->assertEquals('post', $found->sub_type);
```

### for_post_types(string ...$post_types): array<Meta_Data_Entity>

```php
$inspector = Meta_Data_Inspector::initialise();
$meta = $inspector->find_post_meta('post', 'page');
var_dump($meta); //[Meta_Data_Entity, Meta_Data_Entity,Meta_Data_Entity];

$expected = ['post_meta1', 'post_meta2', 'page_meta1'];
$this->assertCount(count($expected), $meta);
foreach($meta as $value){
    $this->assertInArray($meta->meta_key, $expected);
}
```

