<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $title = 'User';
        $users = User::latest()->get();
        return Inertia::render('Users/Index', [
            'title' => $title,
            'users' => $users
        ]);
    }

    public function show(User $user)
    {
        $title = 'Profile';
        return Inertia::render('Users/Detail', [
            'title' => $title,
            'user' => $user
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Register');
    }

    public function store(Request $request)
    {
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();

        //cara kedua
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);

        //cara ketiga
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
        ]);

        $post = $request->all();
        $post['password'] = bcrypt($request->password);
        User::create($post);

        return Redirect::route('user.index')->with('message', 'User created');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return Inertia::render('Users/Edit',[
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
       ]);
        
        User::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
             ]);
        

        return Redirect::route('user.index')->with('message', 'User updated');
    }
    

    public function destroy($id)
    {
        //cara pertama
        // $user = User::find($id);
        // $user->delete();

        //cara kedua
        User::destroy($id);

        return Redirect::route('user.index')->with('message', 'User deleted');
    }
}
