<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success(Request $request)
    {
        $request=$request->all();
        dump($request);

        return $request;
    }

    public function failure(Request $request)
    {
        $request=$request->all();
        dump($request);

        return $request;
    }

    public function pending(Request $request)
    {
        $request=$request->all();
        dump($request);

        return $request;
    }
}
