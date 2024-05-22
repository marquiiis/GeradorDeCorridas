<?php
namespace App;

class RaceController
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getPdo();
    }

    public function createRace($data)
    {
        $stmt = $this->db->prepare("INSERT INTO races (user_id, start_location, end_location, status) VALUES (:user_id, :start_location, :end_location, 'active')");
        $stmt->execute([
            ':user_id' => $data['user_id'],
            ':start_location' => $data['start_location'],
            ':end_location' => $data['end_location']
        ]);
        return ['message' => 'Race created successfully'];
    }

    public function cancelRace($id)
    {
        $stmt = $this->db->prepare("UPDATE races SET status = 'cancelled' WHERE id = :id AND status = 'active'");
        $stmt->execute([':id' => $id]);
        if ($stmt->rowCount() > 0) {
            return ['message' => 'Race cancelled successfully'];
        }
        return ['message' => 'Race not found'];
    }

    public function handleRequest($request)
    {
        $data = json_decode($request, true);
        if ($data['action'] === 'create') {
            return $this->createRace($data);
        } elseif ($data['action'] === 'cancel') {
            return $this->cancelRace($data['id']);
        }
        return ['error' => 'Invalid action'];
    }
}
