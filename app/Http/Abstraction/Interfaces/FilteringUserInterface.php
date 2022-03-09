<?php


namespace App\Http\Abstraction\Interfaces;


use App\Http\Abstraction\Classes\UserDTOClass;

interface FilteringUserInterface
{
    public function setUser(UserDTOClass $userDTO): FilteringUserInterface;

    public function applyStatus($status): FilteringUserInterface;

    public function applyAmount($min, $max): FilteringUserInterface;

    public function applyCurrency($currency): FilteringUserInterface;

    public function isValid(): bool;

}
