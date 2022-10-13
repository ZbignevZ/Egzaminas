<?php

namespace App\Http\Controllers;

use App\Models\MovieImage;
use App\Http\Requests\StoreMovieImageRequest;
use App\Http\Requests\UpdateMovieImageRequest;

class MovieImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MovieImage  $movieImage
     * @return \Illuminate\Http\Response
     */
    public function show(MovieImage $movieImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MovieImage  $movieImage
     * @return \Illuminate\Http\Response
     */
    public function edit(MovieImage $movieImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieImageRequest  $request
     * @param  \App\Models\MovieImage  $movieImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieImageRequest $request, MovieImage $movieImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovieImage  $movieImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovieImage $movieImage)
    {
        //
    }
}
