<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/create', 'UserController@create')->name('users.create')->middleware([]);
Route::post('/users/create', 'UserController@store')->name('users.store')->middleware([]);
Route::get('/users/{user}', 'UserController@show')->name('users.show')->middleware([]);

/*Route::get('viewtest', function(){
    $categories = App\Category::with('groups')->get();
    return view('user.create', compact('categories'));
});*/

/*Route::get('viewtest', function(){
    return App\RoleAssignment::create([
        'relation_from_id' => /*App\Group::first()->id '17ba50c2-e153-4fb5-9a8b-f7077db9bc86',
        'relation_from_type' => App\Group::class,
        'relation_to_id' => App\Category::first()->id,
        'relation_to_type' => App\Category::class,
        'user_id' => App\User::first()->id
    ]);

//    App\Category::first()->groups()->create(['name' => 'Some Group', 'user_id' => App\User::first()->id])

//    return App\User::first()->createdGroups()->create(['name' => 'SomeGroup 3']);
});*/

/*Route::post('viewtest', function(\Illuminate\Http\Request $request){
    return $request->all();
});*/
