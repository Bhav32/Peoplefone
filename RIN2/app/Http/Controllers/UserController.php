<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withUnreadNotificationsCount()->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:120',
            'notification_switch' => 'boolean',
            'email' => 'required|email',
            'phone_number' => ['required', 'numeric', 'digits:10'],
        ]);

        if (!$validator->fails()) {
            $user = User::findOrFail($id);
            
            $user->update([
                'name' => $request->input('name'),
                'notification_switch' => $request->input('notification_switch',false),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
            ]);
        
            return redirect()->route('user.index', $user)->with('success', 'User settings updated successfully');
        } 
        else {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
