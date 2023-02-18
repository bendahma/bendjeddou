<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash ;
use App\User ;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backoffice.users.index')->with('users',$users);
    }

    public function create()
    {
        return view('backoffice.users.create');
    }


    public function store(Request $request)
    {

        User::create([
            'name' => $request->name,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'role' => $request->role ,
        ]);

        toast('Nouvelle utilisateur ajouté avec success','success');
        
        return redirect()->route('users.index');

    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        return view('backoffice.users.create')->with('user',$user);

    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'role' => $request->role ,
        ]);
        toast('L\'utilisateur mettre  jours avec success','success');
        return redirect()->route('users.index');
    }

   public function supprime(User $user){
        $user->delete();
        toast('L\'utilisateur supprime avec success','success');
        return redirect()->route('users.index');

   }

    public function destroy($id)
    {
        //
    }
}
