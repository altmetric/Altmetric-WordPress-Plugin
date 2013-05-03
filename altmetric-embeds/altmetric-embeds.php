<?php
/*
 * Plugin Name: Altmetric embeds
 * Plugin URI: http://api.altmetric.com/embeds.html
 * Description: This plugin allows you to easily add altmetric embeds
 * Version: 0.0.1
 * Author: Altmetric
 * Author URI: http://altmetric.com
 * License: GPL2
 * */

class altmetric {
    function dois($content) {
        $new_content = preg_replace("/altmetric:(doi|arxiv-id|pmid|handle):(\S+):popover:(\S+):float:(\S+):altmetric/i", "<div class='altmetric-embed' data-badge-type='donut' data-$1='$2' data-badge-popover='$3' style='float: $4'></div>", $content);
        if (PREG_NO_ERROR !== preg_last_error()) {
            return $content;
        } else {
            return $new_content;
        }
    }
    function embed_code($content) {
        $content = altmetric::dois($content);
        $content = sprintf(
            "<script type='text/javascript' src='https://d1bxh8uas1mnw7.cloudfront.net/assets/embed.js'></script>%s",
            $content
        );
        return $content;
    }
}

add_filter('the_content', array('altmetric', 'embed_code'));
?>
