<?php

namespace App\Http\Middleware;

use App\Enums\SubscriptionStatusEnum;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class EnsureUserSubscriptionValid
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
        $userId = $request->user()->id;

        $user = User::find($userId);
        if ($user->subscription->status !== SubscriptionStatusEnum::VALID) {
            return redirect('/expired');
        }
        return $next($request);
    }
}
