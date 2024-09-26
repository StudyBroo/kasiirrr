<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'data_user' => User::all(),
        );

        return view('admin.master.user.list',$data);
        //return view ('index', $data);
        return view ('home', $data);
    }

public function store(Request $request)
{
    user::create([
        'nama'      => $request->nama,
        'email'     => $request->email,
        'password'  => Hash::make($request->nama),
        'role'      => $request->role,
    ]);

    return redirect('/user')-with('succsess', 'Data Berhasil Disimpan');
}
public function update(Request $request, $id)
{
    User::where('id', $id)
    ->where('id', $id)
        ->update([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'password'  => Hash::make($request->nama),
            'role'      => $request->role,
        ]);

        return redirect('/user')-with('succsess', 'Data Berhasil Diubah');
}

public function distroy($id)
{
    $user = User::where('id', $id)->delete();
    return redirect('/user')->with('succsess', 'Data Berhasil Dihapus');
}
}
