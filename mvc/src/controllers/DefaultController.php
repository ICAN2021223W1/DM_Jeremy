<?php

class DefaultController{
	protected static function render($vue, $variables){
		extract($variables);

		ob_start();

		require_once 'src/views/'.$vue;
		$contenu = ob_get_clean();

		echo $contenu;
	}
}