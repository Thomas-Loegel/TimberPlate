<?php


$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

$templates = [
    'page.twig',
    'page-' . $timber_post->post_name . '.twig'
];

Timber::render($templates, $context);
