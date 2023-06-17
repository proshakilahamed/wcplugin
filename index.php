<?php
/*
Plugin Name: Word Count
Plugin URI: https://learnwith.hasinhayder.com
Description: Count Words from any WordPress Post
Version: 1.0
Author: LWHH
Author URI: https://hasin.me
License: GPLv2 or later
Text Domain: word-count
Domain Path: /languages/
*/


function wordcount_load_plugin_textdomain(){
    load_plugin_textdomain('word-count');
}
add_action("plugins_loaded","wordcount_load_plugin_textdomain");

function wordcount_count_the_word($content){
    $strip_tag=strip_tags($content);
    $wordn=str_word_count($strip_tag);
    $label=__("Total Number of World","word-count");
    $label=apply_filters("wordcount_heading",$label);
    $tag=apply_filters("change_tag",'h2');
    $content.=sprintf("<%s>%s:%s</%s>",$tag,$label,$wordn,$tag);
   
    return $content;
}

add_action("the_content","wordcount_count_the_word");
