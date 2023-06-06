<?php

namespace App\Actions;

class UpdateCombination
{
    public function __invoke($combination)
    {
        $combination->touch();
    }
}
