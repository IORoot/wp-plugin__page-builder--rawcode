<?php

namespace andyp\pagebuilder\rawcode\filters;

class filter_module
{


    public function __construct()
    {
        add_filter('pagebuilder_rawcode', [$this, 'filter_code'], 10, 1);
    }


    public function filter_code($organism)
    {

        $code = $organism['raw_code'];

        /**
         * Match any shortcodes.
         */
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