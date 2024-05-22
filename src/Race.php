<?php
namespace App;

class Race
{
    private $id;
    private $userId;
    private $startLocation;
    private $endLocation;
    private $status;

    public function __construct($userId, $startLocation, $endLocation, $status = 'active')
    {
        $this->userId = $userId;
        $this->startLocation = $startLocation;
        $this->endLocation = $endLocation;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getStartLocation()
    {
        return $this->startLocation;
    }

    public function getEndLocation()
    {
        return $this->endLocation;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
