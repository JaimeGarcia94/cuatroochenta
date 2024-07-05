<?php

namespace App\Auth\Domain\RepositoryInterface;

use App\Auth\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function save(User $user): void;
}