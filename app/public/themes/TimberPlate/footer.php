<?php

$timberContext = $GLOBALS['timberContext'];
ob_get_contents();
ob_end_clean();

$templates = array('page-plugin.twig');
Timber::render($templates, $timberContext);
