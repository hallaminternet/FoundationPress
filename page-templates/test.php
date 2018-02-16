<?php
/*
Template Name: Test
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render('/templates/test.twig',$context);