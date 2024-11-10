<?php

namespace Mxent\Sample\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'sample::app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            //
        ]);
    }

    /**
     * Handle
     */
    public function handle(Request $request, \Closure $next)
    {
        $response = $next($request);

        $component = isset($response->original['page']) ? $response->original['page']['component'] : $response->original['component'];
        $props = isset($response->original['page']) ? $response->original['page']['props'] : $response->original['props'];

        $controller = $request->route()->getController();
        $controllerRef = (new \ReflectionClass($controller));
        $currentDir = dirname($controllerRef->getFileName());

        while (! file_exists($currentDir.'/composer.json')) {
            $currentDir = dirname($currentDir);
        }
        $composerJson = json_decode(file_get_contents($currentDir.'/composer.json'), true);
        $basePath = base_path();
        $currentDirBits = explode($basePath, $currentDir);
        $componentPath = $currentDirBits[count($currentDirBits) - 1].'/resources/js/pages/'.$component;

        return Inertia::render($componentPath, array_merge($this->share($request), $props));
    }
}
