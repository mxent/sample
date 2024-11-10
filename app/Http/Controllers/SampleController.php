<?php

namespace Mxent\Sample\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SampleController extends Controller implements HasMiddleware
{
    /**
     * Middleware
     */
    public static function middleware(): array
    {
        return [
            // new Middleware('auth'),
        ];
    }

    /**
     * Index
     */
    public function index()
    {
        return inertia('sample/index');
    }
}
