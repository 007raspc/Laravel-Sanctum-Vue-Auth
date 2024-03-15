<?php

namespace App\Http\Resources;

use App\Http\Resources\Company\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role->name,
            'company' => CompanyResource::make($this->active_company),
            'avatar' => [Storage::disk('public')->url($this->avatar ?? 'users_data/default_avatar.jpg')],
        ];
    }
}
