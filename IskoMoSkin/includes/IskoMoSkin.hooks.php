<?php

class IskoMoSkinHooks {

	public static function onBeforePageDisplay(OutputPage &$out, Skin &$skin ){
		global $wgRequest;
		$skinParam = $wgRequest->getText( 'skinParam' );
		if($skinParam == 'IskoMoSkin' || $_COOKIE['skinParam'] == 'IskoMoSkin'){
		    setcookie('skinParam', $skinParam, time() + (86400 * 30), "/");
		    $out->getOutput()->addModuleStyles('IskoMoSkin.style');
		    $out->addMeta( 'viewport', 'width=device-width, initial-scale=1.0, ' . 'user-scalable=no, minimum-scale=0.25, maximum-scale=5.0');
		}
		$out->getOutput()->addModuleScripts('IskoMoSkin.script');
		return true;
	}
	public static function onParseFirstCallInit(Parser $parser){
	
	}
}
