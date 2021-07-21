<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class CaregiverProcess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $caretaker = $user->Caretaker;

        if ($caretaker != null && $caretaker->approved == 'pending' && request()->route()->getName() != 'menunggu-verifikasi') {
            return redirect()->route('menunggu-verifikasi');
        }

        return $next($request);
    }
}
