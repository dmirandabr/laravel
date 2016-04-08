<?php

namespace Poc\Http\Controllers\Mortgage;

use Illuminate\Http\Request;
use Poc\Http\Controllers\Controller;
use Poc\Services\Mortgage\RatesFeed;

class MortgageController extends Controller
{

    public function index()
    {
        return view('mortgage.index');
    }

    public function rates(Request $request, RatesFeed $ratesFeed)
    {
        $response = $ratesFeed->get($request->getQueryString());

        return response()
            ->json(json_decode($response))
            ->setCallback($request->input('callback'));
    }

}
