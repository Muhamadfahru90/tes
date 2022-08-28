<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class UserController extends Controller
{


    public function index(Request $request)
    {
        $users = User::paginate(10);

        return view('user', compact('users'));
    }
    public function register()
    {
        return view('register');
    }
    public function show($id)
    {
        $users = User::Find($id);
        return view('updateuser', compact('users'));
    }
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/users');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/users');
    }
    public function destroy($id)
    {
        // Menggunakan Query Builder
        // DB::table('task') //panggil table di DB nya
        //     ->where('id', $id) //tentukan parameternya untuk menghapus
        //     ->delete(); //hapus datanya
        //Menggunakan Model
        $users = User::Find($id);
        $users->delete();
        return redirect('/users');
    }
}
