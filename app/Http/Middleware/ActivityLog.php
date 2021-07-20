<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\ActivityLogService;
use Route;
use Auth;

class ActivityLog {
    private $activityLogService;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->activityLogService = new ActivityLogService;

        $ipAddress  = $request->ip();
        $macAddress = $this->activityLogService->getMacAddress();
        $uri        = $request->fullURL();
        $action     = Route::getCurrentRoute()->getActionName();
        $params     = $request->all();
        $method     = $request->method();

        if (Auth::check()) {
            $userID = Auth::user()->id;
            $userName = Auth::user()->name;
            $userType = 'user';
        } else if (Auth::guard('admin')->check()) {
            $userID = $Auth::user()->id;
            $userName = $Auth::guard('admin')->user()->name;
            $userType = 'admin';
        } else {
            $userID = null;
            $userName = null;
            $userType = null;
        }

        $this->activityLogService->store($macAddress, $ipAddress, $uri, $action, $params, $method, $userID, $userName, $userType);

        return $next($request);
    }
}
