<?php

namespace App\Models;

interface ValidatorInterface
{
    public function getValidatorRules();
    public function getValidatorMessage();
}
