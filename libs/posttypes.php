<?php 

    add_action('init', 'bloggoals_init_posttypes');
    
    function bloggoals_init_posttypes(){
        
        
        /*
         * Register Topics Post Type
         */
        $recipes_args = array(
            'labels' => array(
                'name' => 'Posty Tematyczne',
                'singular_name' => 'Posty Tematyczne',
                'all_items' => 'Wszystkie Posty Tematyczne',
                'add_new' => 'Dodaj nowy post tematyczny',
                'add_new_item' => 'Dodaj nowy post tematyczny',
                'edit_item' => 'Edytuj post tematyczny',
                'new_item' => 'Nowy post tematyczny',
                'view_item' => 'Zobacz post tematyczny',
                'search_items' => 'Szukaj w postach tematycznych',
                'not_found' =>  'Nie znaleziono żadnych postów tematyczny',
                'not_found_in_trash' => 'Nie znaleziono żadnych postów tematyczny w koszu', 
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true, 
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 5,
            'supports' => array(
                'title','editor','author','thumbnail','excerpt','comments','custom-fields'
            ),
            'has_archive' => true           
        );
        
        register_post_type('topics', $recipes_args);

    }

    
    add_action('init', 'bloggoals_init_taxonomies');
    /* Register taxonomies */
    
    function bloggoals_init_taxonomies(){
        
        // Ingredients
        // register_taxonomy(
        //     'ingredients',
        //     array('recipes'),
        //     array(
        //         'hierarchical' => true,
        //         'labels' => array(
        //             'name' => 'Składniki',
        //             'singular_name' => 'Składniki',
        //             'search_items' =>  'Wyszukaj składniki',
        //             'popular_items' => 'Najpopularniejsze składniki',
        //             'all_items' => 'Wszystkie składniki',
        //             'most_used_items' => null,
        //             'parent_item' => null,
        //             'parent_item_colon' => null,
        //             'edit_item' => 'Edytuj składnik', 
        //             'update_item' => 'Aktualizuj składnik',
        //             'add_new_item' => 'Dodaj nowy składnik',
        //             'new_item_name' => 'Nazwa nowego skadnika',
        //             'separate_items_with_commas' => 'Oddziel składniki przecinkiem',
        //             'add_or_remove_items' => 'Dodaj lub usuń składniki',
        //             'choose_from_most_used' => 'Wybierz spośród najczęścież używanych składników',
        //             'menu_name' => 'Składniki',
        //         ),
        //         'show_ui' => true,
        //         'update_count_callback' => '_update_post_term_count',
        //         'query_var' => true,
        //         'rewrite' => array('slug' => 'ingredient' )
        // ));

        // Topics Types
        register_taxonomy(
            'topic-type',
            array('topics'),
            array(
                'hierarchical' => true,
                'labels' => array(
                    'name' => 'Typ postu tematycznego', 'taxonomy general name',
                    'singular_name' => 'Typ postu tematycznego', 'taxonomy singular name',
                    'search_items' =>  'Wyszukaj typ postu tematycznego',
                    'popular_items' => 'Najpopularniejsze typy postów',
                    'all_items' => 'Wszystkie typy postów',
                    'most_used_items' => null,
                    'parent_item' => null,
                    'parent_item_colon' => null,
                    'edit_item' => 'Edytuj typ postu tematycznego', 
                    'update_item' => 'Aktualizuj',
                    'add_new_item' => 'Dodaj nowy typ postu tematycznego',
                    'new_item_name' => 'Nazwa nowego typu postu tematycznego',
                    'separate_items_with_commas' => 'Oddziel typy postów przecinkiem',
                    'add_or_remove_items' => 'Dodaj lub usuń typ postu tematycznego',
                    'choose_from_most_used' => 'Wybierz spośród najczęścież używanych typów postów',
                    'menu_name' => 'Typ postu tematycznego',
                ),
                'show_ui' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'topic-type' )
        )); 
    }

?>
