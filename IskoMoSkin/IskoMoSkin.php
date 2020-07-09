<?php
if ( function_exists( 'wfLoadExtension' ) ) {
	     wfLoadExtension( 'IskoMoSkin' );
	          return true;
} else {
	     die( 'This version of the IskoMoSkin extension requires MediaWiki 1.25+' );
}
