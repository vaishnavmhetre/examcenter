<?php

namespace App\Http\Controllers;

use App\Category;
use App\Group;
use App\RoleAssignment;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $categories = Category::with('groups')->orderBy('name')->get();
        return view('user.create', compact('categories'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){
//        return $request->all();
        $this->validate($request, [
            'first_name' => 'required|alpha',
            'middle_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'groups' => 'required|array|min:1|exists:groups,id',
        ]);

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => app('hash')->make($request->input('email')),

        ]);

        foreach($request->input('groups') as $groupId){
            RoleAssignment::create([
                'relation_from_id' => $user->id,
                'relation_from_type' => User::class,
                'relation_to_id' => $groupId,
                'relation_to_type' => Group::class,
                'user_id' => \Auth::id()
            ]);
        }
//        $user->groups()->attach($request->input('groups'), ['user_id' => \Auth::user()->id]);

        return redirect(
            route(
                'users.show',
                [
                    'user' => $user->id
                ]
            )
        );
    }

    public function show(Request $request, User $user){
        return $user;
    }

}
