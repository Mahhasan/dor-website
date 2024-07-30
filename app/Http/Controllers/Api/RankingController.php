<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ranking;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index()
    {
        $rankings = Ranking::orderByDesc('year')
                           ->orderByDesc('id')
                           ->get(['title', 'year', 'link', 'picture'])
                           ->groupBy('year');

        return response()->json($rankings);
    }
}
