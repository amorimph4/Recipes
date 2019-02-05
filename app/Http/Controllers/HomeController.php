<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Resources\Revenues;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Recipe::all();
        return view( 'admin.pages.recipes.index', compact('pages') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.pages.recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Recipe::create($request->all());
            $request->session()->flash('sucess', 'criado com sucesso');
            return response()->redirectToRoute('recipes');
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops algo deu errado'); 
            return response()->redirectToRoute('recipes');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $Recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view( 'admin.pages.recipes.edit', compact('recipe') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
        try{
            $recipe->update($request->all());
            $request->session()->flash('sucess', 'alterado com sucesso');
            return response()->redirectToRoute('recipes');
        }catch (Exception $e) {
            $request->session()->flash('error', 'Oops algo deu errado'); 
            return response()->redirectToRoute('recipes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $Recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,Recipe $recipe)
    {
        //
        try {
            $recipe->delete();
            $request->session()->flash('sucess', 'deletado com sucesso');
            return response()->redirectToRoute('recipes');
        } catch (Exception $e) {
            $request->session()->flash('error', 'Oops algo deu errado');
            return response()->redirectToRoute('recipes');
        }
    }
}
