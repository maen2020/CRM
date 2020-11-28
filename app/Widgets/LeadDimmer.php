<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class LeadDimmer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
     public function run()
     {
         $count = \App\Lead::count();
         $string = trans_choice('Leads', $count);

         return view('voyager::dimmer', array_merge($this->config, [
             'icon'   => 'voyager-news',
             'title'  => "{$count} {$string}",
             'text'   => 'Leads',
             'button' => [
                 'text' => 'Ver todos los Leads',
                 'link' => route('voyager.leads.index'),
             ],
             'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
         ]));
     }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('Post'));
    }
}
