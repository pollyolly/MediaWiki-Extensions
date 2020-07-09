<?php

class Customized extends WebApi {

	public static function websiteArticle(){
	 	$cache_time = 1209600;
		$cache_path = realpath(dirname(__FILE__))."/cache/";
		$cache_file = "cache-".date('Y-m-d').".php";
		$cache_path_file = $cache_path.$cache_file;
		$ct = 0;
		$output = "";
		if(file_exists($cache_path_file) && ((time() - $cache_time) < filemtime($cache_path_file))){
			$output = file_get_contents($cache_path_file);
		}
		else {
			foreach(parent::getArticleText() as $datas){
				if($ct++ < 3){
					$output .="<div class='ilc-article'>";
          				/*$output .=     "<img class='ilc-article-image' src='";
					$output .= parent::getFeaturedImage($datas['featured_media'])."'>";*/
					$output .= "<span class='ilc-article-image'>";
					$output .= parent::getFeaturedImage($datas['featured_media']);
					$output .=      "</span>";
          				$output .=     "<div class='ilc-article-body'>";
          				$output .=          "<div class='ilc-article-title'>".$datas['title']['rendered']."</div>";
          				$output .=          "<div class='ilc-article-excerpt'>".substr($datas['excerpt']['rendered'],0,100)."...</div>";
					//$output .=          "<a href='".$datas['link']."' target='_blank' class='ilc-article-readmore'>Read more</a>";
					$output .=          "[".$datas['link']." Readmore]";
          				$output .=     "</div>";
          				$output .= "</div>";
				}
			}
			$cache_file_open = fopen($cache_path_file, 'w');
			fwrite($cache_file_open, $output);
			fclose($cache_file_open);
		}
		return $output;
	}
	public static function addGoogleAnalytics(){
          $script .= "<script type='text/javascript'>";
          $script .= "var _gaq = _gaq || [];";
	  $script .= "_gaq.push(['_setAccount', 'UA-7493571-1']);";
          $script .= "_gaq.push(['_trackPageview']);";
          $script .= "(function() {";
          $script .= "var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;";
          $script .= "ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';";
          $script .= "var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);";
          $script .= "})();";
          $script .= "</script>";
          return $script;
     }
}
