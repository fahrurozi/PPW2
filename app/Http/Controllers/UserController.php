<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $batas = 5;
        $data_users = User::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_users->currentPage() - 1);
        return view('users.home', compact('data_users', 'no'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'level' => 'required|string',
            ],
        );

        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password =  Hash::make($request['password']);
        $users->level = $request->level;
        $users->save();
        return redirect('/users')->with('pesan', 'Data Users Berhasil disimpan');
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/users')->with('pesan', 'Data User Berhasil dihapus');
    }

    public function edit($id)
    {
        $data_users = User::where('id', $id)->get();
        return view('users.edit', ['data_users' => $data_users]);
    }


    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password =  Hash::make($request['password']);
        $users->level = $request->level;
        $users->update();
        return redirect('/users')->with('pesan', 'Data User Berhasil diUpdate');
    }

}
