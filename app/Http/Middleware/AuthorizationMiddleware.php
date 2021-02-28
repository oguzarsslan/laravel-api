<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Log;
use Carbon\Carbon;

class AuthorizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        if (session($ip.'ban'))
            return back();

        $logs = new Log();
        $logs->ip = $ip;
        $logs->save();

        $date = Carbon::now()->subMinute();

        $ipcount = Log::where('created_at', '>=', $date)
            ->where('ip', $ip)
            ->count();

        if ($request->header('Key') != '$xv1623tty') {
            if ($ipcount > 30) {
                session()->put($ip.'ban', true);
            }
            return back();
        }

        return $next($request);
    }
}
