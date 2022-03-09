<?php


namespace App\Http\Abstraction\Interfaces;


use App\Http\Abstraction\Classes\UserDTOClass;

interface UserResourceInterface
{
    public function setUser(UserDTOClass $user):UserResourceInterface;

    public function transform(): ?array;
}
