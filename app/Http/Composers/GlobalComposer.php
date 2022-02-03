<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Models\Country;
use Cart;

/**
 * Class GlobalComposer.
 */
class GlobalComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $country = Country::orderBy('country_name', 'ASC')->get();

        $itemsCart = Cart::getContent();

        $view->with('tpr_countries', $country);
        $view->with('favourites_cookies', $itemsCart);
        $view->with('logged_in_user', auth()->user());
    }
}
