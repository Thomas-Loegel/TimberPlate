<?php

$templates = array( 'archive.twig', 'index.twig' );
$data = Timber::get_context();
$data['title'] = 'Archive';

if ( is_day() ) {
	$data['title'] = 'Archive: '.get_the_date( 'D M Y' );
} else if ( is_month() ) {
	$data['title'] = 'Archive: '.get_the_date( 'M Y' );
} else if ( is_year() ) {
	$data['title'] = 'Archive: '.get_the_date( 'Y' );
} else if ( is_tag() ) {
	$data['title'] = single_tag_title( '', false );
} else if ( is_category() ) {
	$data['title'] = single_cat_title( '', false );
	array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
} else if (is_tax()){
    $term = get_queried_object(); // Is this the appropriate way to do it?
	$data['title'] = $term->name;
	$data['term'] = $term;
	array_unshift($templates, 'taxonomy-'.$term->taxonomy.'.twig', 'taxonomy.twig');
} else if ( is_post_type_archive() ) {
	$data['title'] = post_type_archive_title( '', false );
	array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
}

$data['posts'] = Timber::get_posts();

Timber::render( $templates, $data );
