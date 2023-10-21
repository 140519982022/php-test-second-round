<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    /**
     * get data by calling api
     * return @array
     */
    public function index()
    {
        /**
         * Call the API
         */
        $response = Http::post('http://devapi.hidoc.co:8080//TrendingPastCases/PastCases?action=getTrendingCasesCP&userId=586&lastCount=0&searchKeyword=Cance', [
            'action' => 'getTrendingCasesCP',
            'userId' => 586,
            'lastCount' => 0,
            'searchKeyword' => 'Cance',
        ]);

        /**
         * Parse the data
         */
        $data = $response->json();
        
        // dd($data);

        /**
         * Check if 'data' exists in the response
         */
        if (isset($data) && is_array($data)) {
            // dd($data);
            /**
             * Display the data
             */
            return view('api.index', ['data' => $data]);
        } else {
            /**
             * Log the error response
             */
            Log::error('API Request Failed: ' . $response->body());

            /**
             * Handle invalid API response structure
             */
            return view('api.index', ['data' => []]); // Or handle it in another way
        }

    }
}
