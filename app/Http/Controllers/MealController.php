<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\MealImage;
use Illuminate\Http\Request;


class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('meal.index', [
            'meals' => Meal::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meal.create', [
            'restaurants' => Restaurant::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Meal::create([
            'title' => $request->title,
            'price' => $request->price,
            'restaurant_id' => $request->restaurant_id
        ])->addImages($request->file('photo'));
        
        return redirect()->route('m_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        return view('meal.show', [
            'meal' => $meal,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
        return view('meal.edit', [
            'meal' => $meal,
            'restaurants' => restaurant::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request;  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        $meal
        ->update([
            'title' => $request->title,
            'price' => $request->price,
            'restaurant_id' => $request->restaurant_id
        ]);
        $meal
        ->removeImages($request->delete_photo)
        ->addImages($request->file('photo'));

        return redirect()->route('m_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {

        if($meal->getPhotos()->count()){
            $delIds = $meal->getPhotos()->pluck('id')->all();
            $meal->removeImages($delIds);
        }
        $meal->delete();
        return redirect()->route('m_index');
    }
}
