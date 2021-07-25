<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use App\Jobs\ActivityLog as ProcessActivityLog;
use App\Services\ActivityLogService;
use Jenssegers\Agent\Agent;
use Route;
use Auth;

class ActivityLog {

    private $activityLogService;

    public function __construct()
    {
        $this->activityLogService = new ActivityLogService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $agent = new Agent;

        $currentAction = Route::currentRouteAction();
        $userAgent  = $request->header('user-agent');

        $deviceName = $agent->device();
        $deviceType = $agent->device();

        $client        = $agent->browser();
        $clientVersion = $agent->version($client);
        $clientVersion = $client. '-' .$clientVersion;

        $os        = $agent->platform();
        $osVersion = $agent->version($os);
        $osVersion = $os. '-' .$osVersion;

        $ipAddress  = $request->ip();
        $macAddress = $this->activityLogService->getMacAddress();
        $uri        = $request->fullURL();
        $action     = Route::currentRouteAction();
        // $action     = "test";
        $params     = $request->all();
        $method     = $request->method();

        if (Auth::check()) {
            $userID   = Auth::user()->id;
            $userName = Auth::user()->name;
            $userType = 'user';
        } else if (Auth::guard('admin')->check()) {
            $userID   = Auth::user()->id;
            $userName = Auth::guard('admin')->user()->name;
            $userType = 'admin';
        } else {
            $userID   = null;
            $userName = null;
            $userType = null;
        }

        ProcessActivityLog::dispatch($currentAction, $userAgent, $deviceName, $deviceType, $clientVersion, $osVersion, $ipAddress, $macAddress, $uri, $action, $params, $method, $userID, $userName, $userType);
        return $next($request);
    }
}
