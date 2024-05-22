<?php

use PHPUnit\Framework\TestCase;
use App\RaceController;

class RaceControllerTest extends TestCase
{
    private $controller;

    protected function setUp(): void
    {
        $this->controller = new RaceController();
    }

    public function testCreateRace()
    {
        $response = $this->controller->createRace([
            'user_id' => 1,
            'start_location' => 'Location A',
            'end_location' => 'Location B'
        ]);
        $this->assertEquals(['message' => 'Race created successfully'], $response);
    }

    public function testCancelRace()
    {
        $this->controller->createRace([
            'user_id' => 1,
            'start_location' => 'Location A',
            'end_location' => 'Location B'
        ]);
        $response = $this->controller->cancelRace(1);
        $this->assertEquals(['message' => 'Race cancelled successfully'], $response);
    }

    public function testCancelNonExistentRace()
    {
        $response = $this->controller->cancelRace(999); // ID que não existe
        $this->assertEquals(['message' => 'Race not found'], $response);
    }
}
