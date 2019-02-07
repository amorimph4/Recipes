<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('jwt.auth')->group(function () {

	Route::get('/all-recipes', function (Request $request) {
		try {
			return App\Http\Resources\Recipe::collection(\App\Recipe::All());
		} catch (Exception $e) {
			return response()->json(['error' => $e->getMessage()], 400);
		}
	});

	Route::get('/recipe/{recipe}', function (\App\Recipe $recipe) {
		try {
			return new App\Http\Resources\Recipe($recipe);
		} catch (Exception $e) {
			return response()->json(['error' => $e->getMessage()], 400);
		}
	});

	Route::post('/create-recipe', function (Request $request){
		$validatedData = $request->validate([
	        'title' => 'required|max:255',
	        'ingredients' => 'required' , 
	        'method_preparation' => 'required'
	    ]);

		\App\Recipe::create($request->all());
		return response()->json(['sucess' => 'criado com sucesso']);
	});

	Route::post('/update-recipe/{recipe}', function (\App\Recipe $recipe, Request $request){	
		$recipe->update($request->all());
		return new App\Http\Resources\Recipe($recipe);
	});

	Route::post('/delete-recipe/{recipe}', function (\App\Recipe $recipe, Request $request){	
		$recipe->delete();
        return response()->json(['sucess' => 'excluido com sucesso']);
	});
});

Route::post('/login', function ( Request $request) {
	try {
		$token = \Auth::guard('api')->attempt($request->only(['email', 'password']));
		if (!$token) {
			return response()->json([
				'error' => 'Credential Invalid'
			], 400);
		}
	    return response()->json([
	        'token' => $token,
	        'expires' => auth('api')->factory()->getTTL() * 60,
	    ]);
	}catch (\Exception $e){
		return response()->json($e->getMessage());
	}
});