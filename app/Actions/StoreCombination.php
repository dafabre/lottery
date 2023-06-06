<?php

namespace App\Actions;

use App\Models\Combination;

class StoreCombination
{
    public function __invoke($newCombination): Combination
    {
        $combination = new Combination();
        $combination->first_draw = $newCombination['first_draw'];
        $combination->second_draw = $newCombination['second_draw'];
        $combination->third_draw = $newCombination['third_draw'];
        $combination->fourth_draw = $newCombination['fourth_draw'];
        $combination->fifth_draw = $newCombination['fifth_draw'];
        $combination->sixth_draw = $newCombination['sixth_draw'];
        $combination->save();

        return $combination;
    }
}
