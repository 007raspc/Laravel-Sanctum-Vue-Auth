<?php

namespace App\Service\User;

use App\Models\Role;
use App\Models\User;
use App\Service\Helper\HelperService;
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

    public function getUserForLogin(array $data): User|null
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

    public function update(User $user, array $profile): string
    {
        $service = new HelperService();
        $files = $service->moveTo($profile['avatar'], 'users_data/'.$user->id.'/', 'avatar');
        $user->update([
            'name' => $profile['name'],
            'role_id' => Role::where('name', $profile['role'])->first()->id,
            'avatar' => $files[0],
        ]);
        $service->clearFolder('users_data/'.$user->id.'/trash');
        return $profile['email'] . ' updated';
    }
}
