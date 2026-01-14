<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $res){
                $data=$res->validate([
                    'email'=>'required',
                    'password'=>'required'
                ]);

                if(Auth::attempt($data)){
                    return redirect()->route('users.index')->with('success', 'Logged in successfully');
                }else{
                     return redirect('/')->with('error', 'Invalid email or password');
                }
    }

    
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out successfully');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users=User::all();
        return view('home',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'age' => 'required|integer',
            'password' => 'required|confirmed|min:6',

        ]);

        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('users.index')
                     ->with('success', 'User added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $singleuser=User::find($id);
        return view('singleuser',compact('singleuser'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
         $edituser=User::find($id);
        return view('update',compact('edituser'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
        'name'  => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'age'   => 'required|integer',
    ]);

    $user = User::findOrFail($id);

    $user->update([
        'name'  => $request->name,
        'email' => $request->email,
        'age'   => $request->age,
    ]);

    return redirect()->route('users.index')
                     ->with('success', 'User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
       $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
                        ->with('success', 'User deleted successfully');
    }
}
