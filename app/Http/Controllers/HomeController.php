<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Meal;
use App\Models\Restaurant;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function homeList(Request $request)
    {
        // Filter
        if ($request->cat) {
            $meals = Meal::where('restaurant_id', $request->cat);
        } 
        else if ($request->s) {
            $search = explode(' ', $request->s);
            if (count($search) == 1) {
                $meals = Meal::where('title', 'like', '%'.$request->s.'%');
            }
            else {
                $meals = Meal::where('title', 'like', '%'.$search[0].' '.$search[1].'%')
                ->orWhere('title', 'like', '%'.$search[1].'%'.$search[0].'%')
                ->orWhere('title', 'like', '%'.$search[0].'%')
                ->orWhere('title', 'like', '%'.$search[1].'%');
            }
        }
        else {
            $meals = Meal::where('id', '>', 0);
        }

        // Sort
        if ($request->sort == 'rate_asc') {
            $meals->orderBy('rating');
        }
        else if ($request->sort == 'rate_desc') {
            $meals->orderBy('rating', 'desc');
        }
        else if ($request->sort == 'title_asc') {
            $meals->orderBy('title');
        }
        else if ($request->sort == 'title_desc') {
            $meals->orderBy('title', 'desc');
        }
        else if ($request->sort == 'price_asc') {
            $meals->orderBy('price');
        }
        else if ($request->sort == 'price_desc') {
            $meals->orderBy('price', 'desc');
        }
        
        return view('home.index', [
            'meals' => $meals->get(),
            'restaurants' => Restaurant::orderBy('title')->get(),
            'cat' => $request->cat ?? '0',
            'sort' => $request->sort ?? '0',
            'sortSelect' => Meal::SORT_SELECT,
            's' => $request->s ?? '',
        ]);
    }


    public function rate(Request $request, Meal $movie)
    {
        $movie->rating_sum = $movie->rating_sum + $request->rate;
        $movie->rating_count ++;
        $movie->rating = $movie->rating_sum / $movie->rating_count;
        // $movie->rating_sum = $movie->rating_sum + $request->rate;
        // $movie->rating_count ++;
        // $movie->rating_sum = $movie->rating_sum + $movie->rating;
        $movie->save();
        return redirect()->back();
        
    }

}
