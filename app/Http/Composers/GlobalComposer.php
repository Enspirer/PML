<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Models\Country;

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

        $view->with('tpr_countries', $country);
        $view->with('logged_in_user', auth()->user());
    }
}
