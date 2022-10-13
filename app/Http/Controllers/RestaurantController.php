<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Meal;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restaurant.index', [
            'restaurants' => Restaurant::orderBy('updated_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Restaurant::create([
            'title' => $request->title
        ]);

        return redirect()->route('r_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurant.show', [
            'restaurant' => $restaurant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurant.edit', [
            'restaurant' => $restaurant
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->update(
            ['title' => $request->title]
        );
        return redirect()->route('r_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if($restaurant->meals()->count()){
            return 'Negalima.';
        }
        $restaurant->delete();
        return redirect()->route('r_index');
    }
    public function destroyAll(Restaurant $restaurant)
    {
        // $ids = $restaurant->meals()->pluck('id')->all(); short method but exactly the same
        
        $meals = $restaurant->meals();

        $ids = $meals->pluck('id')->all();
        Meal::destroy($ids);
        return redirect()->route('r_index');
    }
}