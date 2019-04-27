<?php namespace LuisMayta\FacebookGallery\Components;

use Cms\Classes\ComponentBase;
use LuisMayta\FacebookGallery\Models\Settings;

class Albums extends ComponentBase 
{

    public function componentDetails()
    {
        return [
            'name'        => 'Show albums facebook',
            'description' => 'Show albums for facebook'
        ];
    }
    public function defineProperties()
    {
        return [
            'cnt' => [
                'description'       => 'The most amount of todo items allowed',
                'title'             => 'Max items',
                'default'           => 4,
            ]
        ];
    }
    public function onRun()
    {
        $settings = Settings::instance();
        $fields = "id,name,description,link,cover_photo,count";
        $fb_page_id = $settings->fb_page_id;
        $access_token =$settings->access_token;
        $graphAlbLink = "https://graph.facebook.com/v3.0/{$fb_page_id}/albums?fields={$fields}&access_token={$access_token}";
        dd($graphAlbLink);
        $jsonData = file_get_contents($graphAlbLink);
        $fbAlbumObj = json_decode($jsonData, true, 512, JSON_BIGINT_AS_STRING);
        $this->page['albums'] = $fbAlbumObj['data'];
        $this->page['token'] = $access_token;
    }
    
}
