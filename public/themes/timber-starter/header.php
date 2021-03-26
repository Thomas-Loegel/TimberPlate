<?php
/*
 * Les plugins tiers qui détournent le thème appelleront wp_head () pour obtenir le modèle d'en-tête.
 * Nous l'utilisons pour démarrer notre tampon de sortie et effectuer le rendu dans le modèle view / page-plugin.twig dans footer.php
 */
$GLOBALS['timberContext'] = Timber::get_context();
ob_start();
