<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Cloure $next, $permisison)
    {
        $user = $request->user();
        if (! $user || !  $user->hasPermission($permisison)) {
            return response()->json(['message'=>'Forbiden'], 403);
        }
        return $next($request);
    }
}