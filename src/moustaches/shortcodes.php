<?php

namespace andyp\pagebuilder\rawcode\moustaches;

/**
 *  Matches [shortcodes]
 */
class shortcodes
{

    public function __construct()
    {
        add_filter('rawcode_moustaches', [$this, 'filter_code'], 10, 1);
    }
    
    public function filter_code($code)
    {

        preg_match_all('/(\[.*\])/', $code, $matches);

        foreach ($matches[0] as $match)
        {
            $shortcode_result = do_shortcode($match);

            if (empty($shortcode_result)){ continue; }
            
            $code = str_replace($match, $shortcode_result, $code);
        }

        return $code;

    }

}