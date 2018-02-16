<?php
/*
Template Name: Test
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['page'] = $post;
$args = array(
// Get post type project
    'post_type' => 'post',
// Get all posts
    'posts_per_page' => -1,
// Order by post date
    'orderby' => array(
        'date' => 'DESC'
    ));
$context['posts'] = new Timber\PostQuery($args);
Timber::render('/templates/test.twig',$context);