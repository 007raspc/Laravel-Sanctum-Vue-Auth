<?php

namespace App\Service\User;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function register(array $data): Exception|bool
    {
        try {
            DB::beginTransaction();
            $role = Role::where('name', $data['role'])->first();
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'role_id' => $role->id,
                'password' => Hash::make($data['password']),
            ]);
            DB::commit();
            return true;
        } catch (Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }

    public function getUserForLogin(array $data): User|bool
    {
        $credentials = request(['login', 'password']);
        auth()->attempt($credentials);

        $user = null;
        if (isset($data['email'])) {
            $user = User::where('email', $data['email'])->first();
        }
        if (isset($data['name'])) {
            $user = User::where('name', $data['name'])->first();
        }
        return $user;
    }

    public function logout(Request $request): bool
    {
        $request->user()->currentAccessToken()->delete();
        return true;
    }
}
