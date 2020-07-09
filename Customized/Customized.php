<?php
if ( function_exists( 'wfLoadExtension' ) ) {
     wfLoadExtension( 'Customized' );
     return true;
} else {
     die( 'This version of the Customized extension requires MediaWiki 1.25+' );
}
