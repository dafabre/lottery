<?php

namespace App\Actions;

use App\Models\Combination;

class SearchCombinations
{
    public function __invoke(array $combination): ?Combination
    {
        $result = Combination::searchCombination($combination['first_draw'])
        ->searchCombination($combination['second_draw'])
        ->searchCombination($combination['third_draw'])
        ->searchCombination($combination['fourth_draw'])
        ->searchCombination($combination['fifth_draw'])
        ->searchCombination($combination['sixth_draw'])
        ->first();

        return $result;
    }
}
