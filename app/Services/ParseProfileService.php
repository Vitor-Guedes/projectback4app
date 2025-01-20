<?php

namespace App\Services;

use Exception;
use Parse\ParseQuery;
use Parse\ParseObject;
use App\Dto\ProfileDto;
use App\Contracts\ProfileServiceInterface;

class ParseProfileService implements ProfileServiceInterface
{
    public function store(array $data)
    {
        try {
            $profile = new ProfileDto(new ParseObject('profile'));
            $profile->fill($data);
            $profile->save();
            return $profile;
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function update(array $data, $id)
    {
        try {
            $profile = $this->first();
            $profile->fill($data);
            $profile->save();
            return $profile;
        } catch (Exception $e) {
            return [];
        }
    }

    public function first()
    {
        try {
            $query = new ParseQuery('profile');
            $model = $query->first();
            return new ProfileDto($model);
        } catch (Exception $e) {
            return [];
        }
    }
}