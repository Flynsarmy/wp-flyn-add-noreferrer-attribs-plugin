<?php

/**
 * Plugin Name: Flyn Add Noreferrer Attribs
 * Description: Adds `rel="noreferrer"` attribute to all script and style tags.
 * Version: 0.0.1
 * Author: Flynsarmy
 * Author URI: https://www.flynsarmy.com/
 */

class FlynAddNoreferrerAttribs
{
    protected static string $site_url = '';

    public static function scriptLoaderTag(string $html, string $handle, string $src): string
    {
        $html = str_replace('<script', "<script rel='noreferrer'", $html);

        return $html;
    }

    public static function styleLoaderTag(string $html, string $handle, string $src): string
    {
        $html = str_replace('<link', "<link rel='noreferrer'", $html);

        return $html;
    }
}

add_filter('script_loader_tag', ['FlynAddNoreferrerAttribs', 'scriptLoaderTag'], 10, 3);
add_filter('style_loader_tag', ['FlynAddNoreferrerAttribs', 'styleLoaderTag'], 10, 3);
