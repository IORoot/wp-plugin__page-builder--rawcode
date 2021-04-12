<?php

namespace andyp\pagebuilder\rawcode;

class initialise
{

    public function __construct()
    {

        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                            Include Field Groups    	        	     │
        // └─────────────────────────────────────────────────────────────────────────┘
        require __DIR__.'/acf/acf_field_groups.php';

        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                Register filter for page builder to use.    		     │
        // └─────────────────────────────────────────────────────────────────────────┘
        new filters\filter_module;
        

        // ┌─────────────────────────────────────────────────────────────────────────┐
        // │                    Register all moustache filters    		             │
        // └─────────────────────────────────────────────────────────────────────────┘
        new moustaches\shortcodes;
        new moustaches\random_image_url;
        new moustaches\php;
    }

}