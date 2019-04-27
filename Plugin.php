<?php namespace LuisMayta\FacebookGallery;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'Albums Facebook',
            'description' => 'Show albums for page facebook',
            'author'      => 'Luis Mayta',
            'icon'        => 'oc-icon-image',
            'homepage'    => 'https://github.com/jorarmarfin/plugin-october-gallery-facebook'
        ];
    }
    public function registerComponents()
    {
        return [
            '\LuisMayta\FacebookGallery\Components\Albums' => 'albums'
        ];
    }

    public function registerSettings()
    {
        return [
            'config' => [
                'label'       => 'luismayta.facebookgallery::lang.plugin.name',
                'description' => 'luismayta.facebookgallery::lang.plugin.description',
                'icon'        => 'oc-icon-image',
                'class'       => 'LuisMayta\FacebookGallery\Models\Settings',
                'order'       => 600
            ]
        ];
    }
}
