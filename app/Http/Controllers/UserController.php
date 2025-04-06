<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::orderBy('id','DESC')->paginate();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation 
       
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password'=> 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'type' => 'required',
        ]);

        $data = User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' =>Hash::make( $request->password),
            'type' => $request->type,
        ]);
        return redirect()->back()->with('success','user added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function posts(string $id)
    {
        //
        $user = User::findOrFail($id);
        return view('users.posts',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|email|unique:users,email,'. $user->id,
            'password'=> 'nullable|min:8',
            'password_confirmation' => 'nullable|same:password',
            'type' => 'required',
        ]);
        $password = $request->has('password') ? Hash::make($request->password) : $user->password;
         $user->update([
            'name'=> $request->name,
            'email' => $request->email, 
            'password' => $password,
            'type' => $request->type,
        ]);
        
        return redirect()->route('users.index')->with('success','user updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);
         $user->delete();
        return redirect()->back()->with('success','user deleted successfully');
    }
}
