// Lazy test example

//@TODO Glynn make this into an actual test case.
register_post_meta('post', 'post_meta_1', ['default' => 'FUCK OFF', 'single' => true, 'type' => 'bool']);
register_post_meta('post', 'post_meta_2', ['default' => 'FUCK OFF', 'single' => true, 'type' => 'bool']);
register_post_meta('page', 'page_meta_1', ['default' => 'FUCK OFF', 'single' => true]);
register_term_meta('some_tax', 'term1', []);
register_term_meta('some_tax', 'term2', []);
register_term_meta('other_tax', 'term', []);
register_meta('user',  'user1', []);
register_meta('user',  'user2', []);

$inspector = new Meta_Data_Inspector();
$inspector =  $inspector->set_registered_meta_data();
dump($inspector);

dump(get_post_meta(1, 'post_meta_1', true));

dump($inspector->find_post_meta('page', 'page_meta_1'));
dump($inspector->for_post_types('post', 'fake'));

dump(Meta_Data_Inspector::initialise()->find_term_meta('some_tax', 'term1'));
dump($inspector->for_taxonomies('some_tax'));

dump($inspector->find_user_meta('user1'));
dump(Meta_Data_Inspector::initialise()->filter(function($e){
    return $e->single === true;
}));