<?php

namespace App\Composers;

use App\Models\Information;
use App\Models\Media;
use App\Models\Settings;
use App\Models\Team;

class Composers
{
    public function compose($view)
    {
        $settings = Settings::all();
        $teams = Team::all();
        $informations = Information::all();
        $media = Media::all();
        $view->with('settings',      $settings)
        ->with('teams',         $teams)
        ->with('informations',         $informations)
        ->with('media',         $media)

        ;}
}
