<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TrackProductViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (auth()->check() && $request->route()->named('product-detail')) {
            $productId = $request->route()->parameter('product_id');
            $userId = auth()->id();
    
            DB::table('product_views')->updateOrInsert(
                ['user_id' => $userId, 'product_id' => $productId],
                ['viewed_at' => now()]
            );
        }
        return $response;
    }
}
