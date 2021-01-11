<?php

namespace andyp\pagebuilder\rawcode;

class initialise
{

    public $organism;


    public function __construct()
    {
        
    }


    public function set($organism)
    {
        $this->organism = $organism;
    }


    public function get()
    {

        $code = $this->organism['raw_code'];

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