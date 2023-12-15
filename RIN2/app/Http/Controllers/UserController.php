<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use \Yajra\DataTables\Facades\DataTables;
use App\Providers\UnreadNotificationsServiceProvider;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('user.index');
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

    /**
     * Rendering the datatable to user list
     */
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $users = User::withUnreadNotificationsCount()->get();
            $query = User::query();
            //$users = User::select(['id', 'name', 'email', 'phone_number']);

            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $query->where(function ($q) use ($searchValue) {
                    $q->where('name', 'like', '%' . $searchValue . '%')
                        ->orWhere('email', 'like', '%' . $searchValue . '%')
                        ->orWhere('phone_number', 'like', '%' . $searchValue . '%');
                });
            }

            return DataTables::of($users)
                ->addColumn('action', function ($user) {
                    if(!(auth()->user()->id == $user->id)){
                        $route = route('user.impersonate', ['user' => $user]);
                        return '<button class="btn btn-primary" type="button" onclick="window.location.href=\'' . $route . '\'">Impersonate</button>';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function impersonate(User $user){

        view()->composer('layouts.home', function ($view) use ($user) {
            $notifications =  $user->unreadNotifications();
            $UnreadNotificationsCount = count($notifications);

            $view->with([
                'notifications' => $notifications,
                'UnreadNotificationsCount' => $UnreadNotificationsCount,
                'notification_switch' => $user->notification_switch,
            ]);
        });
        
        return view('dashboard');
    }
}
