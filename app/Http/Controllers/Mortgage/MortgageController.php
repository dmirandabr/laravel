<?php

namespace Poc\Http\Controllers\Mortgage;

use Illuminate\Http\Request;
use Poc\Http\Controllers\Controller;

class MortgageController extends Controller
{

    public function index()
    {
        return view('mortgage.index');
    }

    public function rates(Request $request)
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'http://www.bankrate.com/']);

        $response = $client->get('ajax/dynamic-content/rate-tables/rt-mortgage-hp-dynamic.aspx?' . $request->getQueryString());
        $response = json_decode((string)$response->getBody());

        return response()->json($response)
            ->setCallback($request->input('callback'));
    }

}
