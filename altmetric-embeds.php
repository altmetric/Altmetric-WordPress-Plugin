<?php
/*
 * Plugin Name: Altmetric embeds
 * Plugin URI: http://api.altmetric.com/embeds.html
 * Description: This plugin allows you to easily add altmetric embeds
 * Version: 0.0.7
 * Author: Altmetric
 * Author URI: http://altmetric.com
 * License: GPL2
 * */

class altmetric
{

    /**
     * NOTE: This method of substituting text into divs is deprecated
     */
    public function dois($content)
    {
        $new_content = preg_replace(
            "/altmetric:(doi|arxiv-id|pmid|handle):(\S+):popover:(\S+):float:(\S+):altmetric/i",
            "<div class='altmetric-embed' data-badge-type='donut' data-$1='$2' "
            + "data-badge-popover='$3' style='float: $4'></div>",
            $content
        );
        if (PREG_NO_ERROR !== preg_last_error()) {
            return $content;
        } else {
            return $new_content;
        }
    }

    public function altmetricCode($atts, $content, $tag)
    {
        extract(shortcode_atts(array(
            'doi' => null,
            'arxiv_id' => null,
            'arxiv' => null,
            'pmid' => null,
            'handle' => null,
            'float' => null,
            'popover' => null,
            'class' => '',
            'style' => '',
            'details' => null,
            'example' => null,
            'type' => 'donut',
        ), $atts));

        $identifier = null;
        $ident_type = null;
        if (isset($doi)) {
            $identifier = $doi;
            $ident_type = "doi";
        } elseif (isset($arxiv_id)) {
            $identifier = $arxiv_id;
            $ident_type = "arxiv-id";
        } elseif (isset($arxiv)) {
            $identifier = $arxiv;
            $ident_type = "arxiv-id";
        } elseif (isset($pmid)) {
            $identifier = $pmid;
            $ident_type = "pmid";
        } elseif (isset($handle)) {
            $identifier = $handle;
            $ident_type = "handle";
        } else {
            # no valid identifier...
            return "<!-- No identifier found, requires one of doi,pmid,arxiv_id,handle -->";
        }

        $embed_class = trim("altmetric-embed " . $class);
        $embed_style = "";
        if (strlen(trim($style)) > 0 || isset($float)) {
            $embed_style = "style='";
            if (isset($float)) {
                $embed_style .= "float: {$float}; ";
            }
            $embed_style .= $style;
            $embed_style .= "'";
        }
        $embed_popover = "";
        if (isset($popover)) {
            $embed_popover = "data-badge-popover='{$popover}'";
        }
        $embed_details = "";
        if (isset($details)) {
            $embed_details = "data-badge-details='{$details}'";
        }
        $embed_element = "<div class='{$embed_class}' data-badge-type='{$type}' "
            + "data-{$ident_type}='{$identifier}' {$embed_popover} {$embed_style} "
            + "{$embed_details}></div>";
        if (isset($example)) {
            $shortcode_example = "<code>[{$tag}";
            foreach ($atts as $key => $value) {
                if ($key == 'example') {
                    continue;
                }
                $shortcode_example .= " {$key}=\"{$value}\"";
            }
            $shortcode_example .= "]</code>";
            if ($example == "before") {
                $embed_element .= $shortcode_example;
            } else {
                $embed_element = $shortcode_example . $embed_element;
            }
        }
        return $embed_element;
    }

    public function embedCode($content)
    {
        $content = altmetric::dois($content);
        $content = sprintf(
            "<script type='text/javascript' src='https://d1bxh8uas1mnw7.cloudfront.net/assets/embed.js'></script>%s",
            $content
        );
        return $content;
    }
}

add_filter('the_content', array('altmetric', 'embedCode'));
add_shortcode('altmetric', array('altmetric', 'altmetricCode'));
