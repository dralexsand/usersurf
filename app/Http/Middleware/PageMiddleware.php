<?php

namespace App\Http\Middleware;

use App\Services\StatService;
use Closure;
use Illuminate\Http\Request;

class PageMiddleware
{
    protected StatService $service;

    public function __construct(StatService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $route = $request->route()->getName() ?? "home";
        $this->service->process($route);

        return $next($request);
    }
}
