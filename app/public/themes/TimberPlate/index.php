<?php

$context = Timber::context();
$context['posts'] = new Timber\PostQuery();
$context['foo'] = 'bar';

$templates = ['index.twig'];


Timber::render($templates, $context);
