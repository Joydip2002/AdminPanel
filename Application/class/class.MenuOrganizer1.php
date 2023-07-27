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
        $sql = "SELECT * FROM `menulist` WHERE parentid = 0 AND status = '1'";
        $result = mysqli_query($this->conn, $sql);
        while ($fetchData = mysqli_fetch_assoc($result)) {
            $fetchData['child'] = $this->getChildMenuItems($fetchData['id']);
            $data[] = $fetchData;
        }
        return $data;
    }
    private function getChildMenuItems($parentId)
    {
        $data = [];
        $sql = "SELECT * FROM `menulist` WHERE parentid = $parentId AND status = '1' ORDER BY orderlist";
        $result = mysqli_query($this->conn, $sql);

        while ($fetchData = mysqli_fetch_assoc($result)) {
            $data[] = $fetchData;
        }

        return $data;
    }
}
?>
