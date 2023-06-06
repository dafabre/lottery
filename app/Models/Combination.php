<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combination extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeSearchCombination($query, int $search)
    {
        $query->where(function ($query) use ($search) {
            $query->where('first_draw', $search)
                ->orWhere('second_draw', $search)
                ->orWhere('third_draw', $search)
                ->orWhere('fourth_draw', $search)
                ->orWhere('fifth_draw', $search)
                ->orWhere('sixth_draw', $search);
        });
    }
}
