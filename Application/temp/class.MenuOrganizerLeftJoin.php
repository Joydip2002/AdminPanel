<?php

class MenuOrganizer1
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function getMenuData()
    {
        $data = [];
        $sql = "SELECT m1.id AS parent_id, m1.title AS parent_title, m2.id AS child_id, m2.title AS child_title
                FROM `menulist` m1
                LEFT JOIN `menulist` m2 ON m1.id = m2.parentid
                WHERE m1.parentid = 0 AND m1.status = '1'
                ORDER BY m1.id, m2.id";

        $result = mysqli_query($this->conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            if (!isset($data[$row['parent_id']])) {
                $data[$row['parent_id']] = [
                    'id' => $row['parent_id'],
                    'title' => $row['parent_title'],
                    'child' => []
                ];
            }

            if ($row['child_id']) {
                $data[$row['parent_id']]['child'][] = [
                    'id' => $row['child_id'],
                    'parentid' => $row['parent_id'],
                    'title' => $row['child_title']
                ];
            }
        }

        return array_values($data); // Re-index the array to remove the parent_id keys
    }
}

?>
