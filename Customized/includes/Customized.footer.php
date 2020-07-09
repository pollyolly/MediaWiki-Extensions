<?php

class CustomizedFooter {

	public static function customFooter($lastmod,$viewcount){

		$fdatas = array(
			'Services' => array('Training' => 'https://ilc.upd.edu.ph/training-education-development-and-support', 
							'Streaming/ Video Coverage' => 'https://iskomunidad.upd.edu.ph/index.php/Guidelines_for_video_or_webcast_coverage_by_DILC', 
							'Podcasting/ Vodcasting' => 'https://iskomunidad.upd.edu.ph/index.php/Category:Vodcast', 
							'Education Tech Consulting' => 'https://iskomunidad.upd.edu.ph/index.php/Technology_integration_in_teaching_and_learning',
							'Internship/ On-the-Job Training' => 'https://ilc.upd.edu.ph/about-internship',
							'Resources' => '#',
							'MediaWiki' => 'https://www.mediawiki.org/wiki/MediaWiki'
			),
			'Websites' => array('UVLe'=> 'https://uvle.upd.edu.ph/login/index.php', 
							'UPCurrents'=> 'https://ilc.upd.edu.ph/working-project-series/upcurrents', 
							'Conference.UPD'=>'https://conference.upd.edu.ph/', 
							'Pages'=>'https://pages.upd.edu.ph',
							'Obletorr'=>'https://ilc.upd.edu.ph/upgrading-enhancement-of-ilc-services/obletorr',
							'LiveStream' => 'https://ilc.upd.edu.ph/livestream'
			),
			'Support' => array('Helpdesk' => 'https://helpdesk.ilc.upd.edu.ph/', 
							'Tech Support Matters' => 'https://iskomunidad.upd.edu.ph/index.php/Category:Tech_Support', 
							'DILC Matters' => 'https://iskomunidad.upd.edu.ph/index.php/Category:DILC_Matters',
							'Download' => '#',
							'DILC Brochure' => 'https://iskomunidad.upd.edu.ph/images/9/91/Dilc_brochure_2009_web_dist.pdf'
			),
			'About' => array(	'Interactive Learning Center' => 'https://ilc.upd.edu.ph/',
							'AUP' => 'https://upd.edu.ph/aup/',
							'Research' => '#',
							'DILC Media Lab' => 'https://iskomunidad.upd.edu.ph/index.php/D_I_L_C_Media_Lab',
			)
		);
		$output .="<div class='isk-lastmod'>";
        	$output .= "<p>".$lastmod."</p>";
		$output .= "<p>".$viewcount."</p>";
	        $output .= "</div>";
		$output .= "<div class='customized-footer'>";
		$i = 0;
		foreach($fdatas as $fdata){
			$hfooter = array_keys($fdatas);
			$output .= "<ul class='customized-footer-col'>";
			$output .= "<li>";
			$output .= $hfooter[$i++];
			$j = 0; $k = 0;
			foreach($fdata as $data){
				$nlink = array_keys($fdata);
				$output .= "<li class='customized-footer-row-".$k++."'>";
				$output .= "<a href='".$data."' target='_blank'>".$nlink[$j++]."</a>";
				$output .= "</li>";
			}
			$output .= "</li>";
			$output .= "</ul>";
		}
		$output .="</div>";
		$output .= self::customFootertwo();
		return $output;
	}
	public static function customFootertwo(){
		$output .="<div class='customized-footer-two'>";
		$output .= "<h1 style='font-size:13pt;'>Interactive Learning Center Diliman</h1>";
		$output .= "<p style='font-size:10pt;line-height:1em;'>DILC Bldg., corner Apacible St. and Magsaysay Ave., University of the Philippines, Diliman, Quezon City 1101</p>";
		$output .= "<p style='font-size:10pt;line-height:1em;'>© 2014 - ".date('Y')." Copyright Interactive Learning Center Diliman</p>";
		$output .="</div>";
		return $output;
	}
}
