<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


	$job_bm_locations_map_type = get_option('job_bm_locations_map_type');
	$job_bm_locations_map_zoom = get_option('job_bm_locations_map_zoom');	

	$job_bm_location_country_code = get_post_meta(get_the_ID(),'job_bm_location_country_code', true);	
	$job_bm_location_latlang = get_post_meta(get_the_ID(),'job_bm_location_latlang', true);
	
	$location_post_data = get_post(get_the_ID());
	
	if ( !empty($job_bm_location_latlang) )
	{
		$job_bm_location_latlang = explode(',',$job_bm_location_latlang);
	
		if(!empty($job_bm_location_latlang[0]))
			$job_bm_location_latlang['lat'] =$job_bm_location_latlang[0];
		else $job_bm_location_latlang['lat'] ='';
		
		if(!empty($job_bm_location_latlang[1]))
			$job_bm_location_latlang['lng'] =$job_bm_location_latlang[1];
		else $job_bm_location_latlang['lng'] ='';
			
		if(empty($job_bm_locations_map_type))
			$job_bm_locations_map_type = 'static';

		
		
		if($job_bm_locations_map_type=='dynamic')
		{
			echo '<div class="map-container"><div id="map"></div></div>';
			echo '
			<script>
				function initMap() {
					var myLatLng = {lat: '.$job_bm_location_latlang['lat'].', lng: '.$job_bm_location_latlang['lng'].'};

					var map = new google.maps.Map(document.getElementById("map"), {
						zoom: '.$job_bm_locations_map_zoom.',
						center: myLatLng
					});
					
					var marker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						title: "'.get_the_title().'"
					});
				}
			</script>
			
			<script async defer src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap"></script>';
		}
		elseif($job_bm_locations_map_type=='static'){
			
			// Free Gogole map API doesn't support more than 640x640 'px size image return.
			
			echo '<div class="map-container"><div id="map"><img  src="https://maps.googleapis.com/maps/api/staticmap?center='.$job_bm_location_latlang['lat'].','.$job_bm_location_latlang['lng'].'&zoom='.$job_bm_locations_map_zoom.'&size=1024x300&markers=color:red|label:C|'.$job_bm_location_latlang['lat'].','.$job_bm_location_latlang['lng'].'"/></div></div>';
		}
		
		
		elseif($job_bm_locations_map_type=='none'){
			
			echo '';
		}		
		
		else{
			
			}
		
		
	}
	
	
	
	echo '<div class="logo"><img src="'.job_bm_locations_plugin_url.'assets/front/images/map.png" /></div>';
	
	
	$class_job_bm_locations_functions = new class_job_bm_locations_functions();
	$job_bm_locations_country_list = $class_job_bm_locations_functions->job_bm_locations_country_list();
	

	echo '<h1 itemprop="name" class="name">'.$location_post_data->post_title;
	
	if(!empty($job_bm_locations_country_list[$job_bm_location_country_code])){
		echo '<span class="country">'.$job_bm_locations_country_list[$job_bm_location_country_code].'</span>';
		}
	
	
	echo '</h1>';		
	
	
	
	
	
	$location_content = $location_post_data->post_content;
	
	if(empty($location_content)){
		
		$job_bm_display_wiki_content = get_option('job_bm_display_wiki_content');
		
		if(!empty($job_bm_display_wiki_content) && $job_bm_display_wiki_content=='yes'){
			
				$content = curl_get_contents('https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles='.str_replace(' ','_',$location_post_data->post_title));
				$wiki_content_json = json_decode($content,true);
		
				//var_dump($wiki_content_json);
				 
				foreach($wiki_content_json['query'] as $query){
		
					foreach($query as $normalized){
						
							$page_content = $normalized['extract'];
						}
					}
				
				//var_dump($wiki_content_json);
				//var_dump($wiki_content_json['query']['pages']['56656']['extract']);
			
				echo '<div class="description"><strong>'.__('Source:',job_bm_locations_textdomain).' wikipedia.org</strong><br/>'.$page_content.'</div>';	
			
			}
		else{
			
			echo '<div class="description"></div>';	
			}
		
		

		}
	else{
		echo '<div class="description">'.wpautop($location_content).'</div>';	
		}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	