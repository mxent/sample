<?php

namespace Mxent\Sample\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Inertia\Inertia;

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

    /**
     * Deferred
     */
    public function deferred()
    {
        return inertia('sample/deferred', [
            'users' => Inertia::defer(fn () => $this->users()),
        ]);
    }

    /**
     * Users
     */
    private function users()
    {
        sleep(2);

        return [
            ['id' => 1, 'name' => 'John Doe'],
            ['id' => 2, 'name' => 'Jane Doe'],
            ['id' => 3, 'name' => 'John Smith'],
            ['id' => 4, 'name' => 'Jane Smith'],
            ['id' => 5, 'name' => 'John Brown'],
            ['id' => 6, 'name' => 'Jane Brown'],
            ['id' => 7, 'name' => 'John White'],
            ['id' => 8, 'name' => 'Jane White'],
            ['id' => 9, 'name' => 'John Black'],
            ['id' => 10, 'name' => 'Jane Black'],
        ];
    }
}
