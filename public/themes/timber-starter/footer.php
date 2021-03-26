<?php
/*
 * Les plugins tiers qui détournent le thème appelleront wp_footer () pour obtenir le modèle de pied de page.
 * Nous l'utilisons pour terminer notre tampon de sortie (démarré dans header.php) et effectuer le rendu dans le modèle view / page-plugin.twig.
 */
$timberContext = $GLOBALS['timberContext'];

if ( ! isset( $timberContext ) ) {
	throw new \Exception( 'Timber context not set in footer.' );
}

$timberContext['content'] = ob_get_contents();
ob_end_clean();
$templates = array( 'page-plugin.twig' );
Timber::render( $templates, $timberContext );
