<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\ActivityLogService;
use App\Services\SessionService;
use Log;

class ActivityLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $sessionService;
    private $activityLogService;
    private $currentAction;
    private $userAgent;
    private $deviceName;
    private $deviceType;
    private $clientVersion;
    private $osVersion;
    private $ipAddress;
    private $macAddress;
    private $uri;
    private $action;
    private $params;
    private $method;
    private $userID;
    private $userName;
    private $userType;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($currentAction, $userAgent, $deviceName, $deviceType, $clientVersion, $osVersion, $ipAddress, $macAddress, $uri, $action, $params, $method, $userID, $userName, $userType)
    {
        $this->sessionService     = new SessionService;
        $this->activityLogService = new ActivityLogService;
        $this->currentAction      = $currentAction;
        $this->userAgent          = $userAgent;
        $this->deviceName         = $deviceName;
        $this->deviceType         = $deviceType;
        $this->clientVersion      = $clientVersion;
        $this->osVersion          = $userAgent;
        $this->ipAddress          = $ipAddress;
        $this->macAddress         = $macAddress;
        $this->uri                = $uri;
        $this->action             = $action;
        $this->params             = $params;
        $this->method             = $method;
        $this->userID             = $userID;
        $this->userType           = $userType;
        $this->userName           = $userName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $sessionID = $this->sessionService->store($this->ipAddress, $this->clientVersion, $this->deviceName, $this->deviceType, $this->osVersion, $this->userAgent, 'HCM', $this->userID, $this->userType)->id;
            $this->activityLogService->store($this->macAddress, $this->ipAddress, $this->uri, $this->action, $this->params, $this->method, $this->userID, $this->userName, $this->userType, $sessionID);
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
