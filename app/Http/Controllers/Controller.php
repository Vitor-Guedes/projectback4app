<?php

namespace App\Http\Controllers;

use App\Contracts\ProfileServiceInterface;
use App\Models\Profile;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function admin(ProfileServiceInterface $profileService)
    {
        $profile = $profileService->first();

        if (isset($profile->id)) {
            return view('admin', ['profile' => $profile]);
        }

        return view('admin');
    }

    public function store(ProfileServiceInterface $profileService)
    {
        $profile = request()->except('_token');
        $profileService->store($profile);
        return redirect()->back();
    }

    public function update(ProfileServiceInterface $profileService)
    {
        $profile = request()->except('_token');
        $profileService->update($profile, 0);

        return redirect()->back();
    }

    public function profile(ProfileServiceInterface $profileService)
    {
        $profile = $profileService->first();
        return response()->json($profile->toArray(), 200);
    }
}
