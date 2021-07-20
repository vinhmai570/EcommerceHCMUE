<?php
namespace App\Services;

use App\Models\ActivityLog;

class ActivityLogService {
    protected $activityLog;

    public function __construct()
    {
        $this->activityLog = new ActivityLog;
    }

    public function getMacAddress()
    {
        $macs = trim(shell_exec("arp -an | grep -o -E '([[:xdigit:]]{1,2}:){5}[[:xdigit:]]{1,2}'"));
        $macs = str_replace(array("\n", "\r"), " ", $macs);
        $listMac = explode(" ", $macs);

        return $listMac[count($listMac) - 1];
    }

    public function store($macAddress, $ipAddress, $uri, $action, $params, $method, $userID, $userName, $userType)
    {
        $activityLog = array(
            'mac_address' => $macAddress,
            'ip_address'  => $ipAddress,
            'uri'         => $uri,
            'action'      => $action,
            'params'      => $params,
            'method'      => $method,
            'user_id'     => $userID,
            'username'    => $userName,
            'user_type'   => $userType
        );

        return $this->activityLog->create($activityLog);
    }
}
