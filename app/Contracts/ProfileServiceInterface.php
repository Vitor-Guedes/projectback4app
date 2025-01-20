<?php

namespace App\Contracts;

interface ProfileServiceInterface
{
    public function store(array $data);

    public function update(array $data, $id);

    public function first();
}