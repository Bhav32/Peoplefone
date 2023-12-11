<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Notifications;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notifications::with('users')->get();
        return view('Notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('notifications.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //Validation Checks for the form fields
         $validator = Validator::make($request->all(), [
            'type' => 'required',
            'short_text' => 'required|max:120',
            'user_id' => 'required',
            'expiration' => 'required',
        ]);

        if (!$validator->fails()) {

            $notification = Notifications::create([
                'type' => $request->input('type'),
                'text' => $request->input('short_text'),
                'expiration' => $request->input('expiration'),
            ]);
        
            // Attach users to the notification
            if ($request->input('user_id') === 'all') {
                // Get all user IDs
                $allUserIds = User::pluck('id')->toArray();
                $notification->users()->sync($allUserIds);
            } else {
                // Attach the selected user to the notification
                $notification->users()->sync([$request->input('user_id')]);
            }
        
            return redirect()->route('notifications.index');
        }else {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
