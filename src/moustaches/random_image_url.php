<?php

namespace andyp\pagebuilder\rawcode\moustaches;

/**
 *  Matches {{random_image_url:4,67,1,73,2}}
 * 
 * CSV of image IDs.
 */
class random_image_url
{

    public function __construct()
    {
        add_filter('rawcode_moustaches', [$this, 'filter_code'], 10, 1);
    }

    public function filter_code($code)
    {

        preg_match_all('/{{random_image_url:(.*)}}/', $code, $image_ids);

        if (empty($image_ids[0])){ return $code; }

        $ids = explode(',', $image_ids[1][0]);

        $random_key = array_rand($ids);

        $image_src = wp_get_attachment_image_src($ids[$random_key], 'full');

        if (!is_array($image_src)){ return $code; }

        $code = str_replace($image_ids[0][0], $image_src[0], $code);

        return $code;

    }

}