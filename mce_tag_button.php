<?php
/**
 Plugin Name: MCE Tags Buttons
 Plugin URI: /
 Description: Add <strong>tags button</strong> to the WordPress WYSIWYG editor.    
 Version: 1.0
 Author: Romuald PIERONKIEWIEZ
 Author URI: http://lamidudeveloppeur.fr
 License: GPLv2 or later
*/

function add_buttons(){
	if(current_user_can('edit_posts') && current_user_can('edit_pages')){
		add_filter('mce_external_plugins','add_plugins');
		add_filter('mce_buttons', 'register_buttons');
	}
}
add_action('init','add_buttons');

function add_plugins($plugins) {
	$plugins_url = plugin_dir_url( __FILE__ );
	$plugins['tagsbutton'] = $plugins_url.'assets/tags-button.js';
	return $plugins;
}
function register_buttons($buttons) {
	array_push($buttons, 'tagsbutton');
	return $buttons;
}

function getTags() {
	$FichierCache = '../wp-content/plugins/mce-tag-button/assets/tag.txt'; 
	$expiration = time() - 60 ; 
	if(file_exists($FichierCache) && filemtime($FichierCache) > $expiration) {
	   readfile($FichierCache); 
	} else {
	   ob_start(); 
	   $tags = get_tags();
		foreach ( $tags as $tag ) {		
			echo '<li onclick="clickTag(\''.$tag->slug.'\')"><input class="item-slug" type="hidden" value="'.$tag->slug.'" /><span class="item-title">'.$tag->name.'</span></li>';
		}
	   $donnees = ob_get_contents(); 
	   ob_end_clean(); 
	   file_put_contents($FichierCache, $donnees); 
	   echo $donnees; 
	}
	die();
}
add_action('wp_ajax_get_data', 'getTags');

?>