<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class StepDimmer extends AbstractWidget
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
         $count = \App\Step::count();
         $string = trans_choice('Steps', $count);

         return view('voyager::dimmer', array_merge($this->config, [
             'icon'   => 'voyager-news',
             'title'  => "{$count} {$string}",
             'text'   => 'Steps',
             'button' => [
                 'text' => 'Ver todos los Steps',
                 'link' => route('voyager.steps.index'),
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
