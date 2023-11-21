<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewUsers', User::class);
        $users = User::all();
        return response(compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRegistrationRequest $request)
    {
        $this->authorize('storeUser', User::class);
        $data = $request->validated();
        User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        return response()->json(["message"=>"User was created successfully"], 200);

        // $user = Auth::user();
        // dd($user->roles->contains('name', 'admin'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // $this->authorize('updateUser', User::class);
        $data = $request->validated();
        if(isset($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        return new UserResource($user);
    }

    /**
     * Softly remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response('', 204);
    }

    /**
     * Permanently remove the specified resource from storage.
     */
    public function delete(User $user)
    {
        $user->forceDelete();
        return response('', 204);
    }
}
