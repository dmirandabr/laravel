<?php

namespace Poc\Http\Controllers\Mortgage;

use Illuminate\Http\Request;
use Poc\Http\Controllers\Controller;
use Poc\Services\Feed\MortgageOAFeed as MortgageOAFeed;

class OAServiceController extends Controller
{

    public function index(Request $request, MortgageOAFeed $mortgageOAFeed, $productIds = null, $marketId = null)
    {
        $mortgageOA = $mortgageOAFeed->get($productIds, $marketId);

        return response()->json($mortgageOA)
            ->setCallback($request->input('callback'));
    }

}
