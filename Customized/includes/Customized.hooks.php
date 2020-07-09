<?php

class CustomizedHooks {

	public static function onBeforePageDisplay( OutputPage &$out, Skin &$skin ) {
		$out->getOutput()->addModuleStyles('ilc.Customized.style');
		$out->getOutput()->addModuleScripts('ilc.Customized.script');
		$out->addHeadItem('google-analytics', Customized::addGoogleAnalytics());
		return true;
	}
	public static function onParserFirstCallInit( Parser $parser ){
	        $parser->setHook('ilc-article', 'CustomizedHooks::getOutputHtml');
	}
	public static function getOutputHtml(){
		$localParser = new Parser();
		$input = Customized::websiteArticle();
		$context = new RequestContext();
		$title = $context->getTitle();
		$parserOptions = new ParserOptions;
		$output = $localParser->parse($input, $title, $parserOptions);
		return $output->getText();
	}

}
