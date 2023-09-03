<?php

namespace App\Providers;

use App\Models\Item;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CommonDataServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->shareCommonData();
    }

    protected function shareCommonData()
    {
        // $allitems = Item::all();
        // View::share('allitems', $allitems);

        $allitems = Item::orderBy('balance','DESC')->where('low_limit', '>=', 'balance')->get();
        View::share('allitems', $allitems);

        // dd($allitems);
    }
}