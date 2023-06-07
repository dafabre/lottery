<?php

namespace App\Http\Controllers;

use App\Actions\SearchCombinations;
use App\Actions\StoreCombination;
use App\Actions\UpdateCombination;
use App\Http\Requests\CombinationRequest;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LottoController extends Controller
{
    public function index()
    {
        return Inertia::render('Index');
    }

    public function store(CombinationRequest $request)
    {
        $draws = $request->input('draws');
        $result = [];

        foreach ($draws as $combination) {
            $searched = (new SearchCombinations())($combination);

            if ($searched) {
                $combination['updated_at'] = $searched->updated_at;
                $result[] = $combination;
                (new UpdateCombination())($searched);
            } else {
                unset($combination['updated_at']);
                $result[] = $combination;
                (new StoreCombination())(newCombination: $combination);
            }
        }

        return Inertia::render('Index', [
            'draws' => $result,
        ]);
    }
}
