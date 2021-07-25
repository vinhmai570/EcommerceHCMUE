<?php

namespace App\Services;

use App\Models\Session;

class SessionService {
    protected $session;

    public function __construct()
    {
        $this->session = new Session;
    }

    public function store($ipAddress, $client, $deviceName, $deviceType, $os, $userAgent, $city, $sessionableID, $sessionableType)
    {
        $session = array(
            'ip_address'  => $ipAddress,
            'client'      => $client,
            'device_name' => $deviceName,
            'device_type' => $deviceType,
            'os'          => $os,
            'user_agent'  => $userAgent,
            'city'        => $city,
            'sessionable_id'     => $sessionableID,
            'sessionable_type'   => $sessionableType
        );

        return $this->session->create($session);
    }

    public function find($macAddress, $sessionableID)
    {
        $session = array(
            'ip_address'  => $ipAddress,
            'client'      => $client,
            'device_name' => $deviceName,
            'device_type' => $deviceType,
            'os'          => $os,
            'user_agent'  => $userAgent,
            'city'        => $city,
            'sessionable_id'     => $sessionableID,
            'sessionable_type'   => $sessionableType
        );

        return $this->session->create($session);
    }
}
