<?php
/*
Template Name: Potato
*/

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render('/templates/potato.twig',$context);