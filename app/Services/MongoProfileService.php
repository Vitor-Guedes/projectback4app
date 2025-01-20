<?php

namespace App\Services;

use App\Contracts\ProfileServiceInterface;
use App\Dto\ProfileDto;
use App\Models\Profile;

class MongoProfileService implements ProfileServiceInterface
{
    public function store(array $data)
    {
        return new ProfileDto(Profile::create($data));
    }

    public function update(array $data, $id)
    {
        $profile = Profile::first();

        $profile->fill($data);
        $profile->save();

        return new ProfileDto($profile);
    }

    public function first()
    {
        return new ProfileDto(Profile::first());
    }
}