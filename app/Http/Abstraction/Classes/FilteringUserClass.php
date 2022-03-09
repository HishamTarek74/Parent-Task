<?php


namespace App\Http\Abstraction\Classes;


use App\Http\Abstraction\Interfaces\FilteringUserInterface;

class FilteringUserClass implements FilteringUserInterface
{
    private $userDTO;
    private $valid;

    public function __construct(UserDTOClass $userDTO)
    {
        $this->setUser($userDTO);
    }

    public function setUser(UserDTOClass $userDTO): FilteringUserInterface
    {
        $this->userDTO = $userDTO;
        $this->valid = true;
        return $this;
    }

    public function applyStatus($status = null): FilteringUserInterface
    {
        if ($this->valid && isset($status)) {
            $this->valid = strtolower($this->userDTO->getStatus()) === strtolower($status);
        }
        return $this;
    }

    public function applyAmount($min = null, $max = null): FilteringUserInterface
    {
        if ($this->valid) {
            if (isset($min)) {
                $this->valid = $this->userDTO->getAmount() >= floatval($min);
            }
            if (isset($max)) {
                $this->valid = $this->userDTO->getAmount() <= floatval($max);
            }
        }
        return $this;
    }

    public function applyCurrency($currency = null): FilteringUserInterface
    {
        if ($this->valid && isset($currency)) {
            $this->valid = strtolower($this->userDTO->getCurrency()) === strtolower($currency);
        }
        return $this;
    }

    public function isValid(): bool
    {
        return $this->valid;
    }
}
