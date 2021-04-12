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
        if (empty($organism['enabled'])){ return; }

        $code = $organism['raw_code'];

        $code = apply_filters('rawcode_moustaches', $code);

        return $code;
    }

}