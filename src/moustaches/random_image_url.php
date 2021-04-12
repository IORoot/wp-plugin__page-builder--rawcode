<?php

namespace andyp\pagebuilder\rawcode\moustaches;

/**
 *  Matches {{random_image_url:4,67,1,73,2}}
 * 
 * or via shortcode with:
 * 
 * [random_image_url ids="4,67,1,73,2"]
 * 
 * CSV of image IDs.
 */
class random_image_url
{

    public function __construct()
    {
        add_filter('rawcode_moustaches', [$this, 'filter_code'], 10, 1);
        add_shortcode('random_image_url', [$this, 'shortcode_code']);
    }
    
    public function shortcode_code($atts, $content, $shortcode_tag)
    {
        $code = '{{random_image_url:'.$atts['ids'].'}}';
        $url = $this->filter_code($code);
        return $url;
    }


    public function filter_code($code)
    {

        preg_match_all('/{{random_image_url:(.*)}}/', $code, $image_ids);

        if (empty($image_ids[0])){ return $code; }

        $ids = explode(',', $image_ids[1][0]);

        $random_key = array_rand($ids);

        $image_src = wp_get_attachment_image_src($ids[$random_key]);

        if (!is_array($image_src)){ return $code; }

        $code = str_replace($image_ids[0][0], $image_src[0], $code);

        return $code;

    }

}