<?php

class MenuListRepository
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function getMenuItemsByParentId($parentId)
    {
        $sql = "SELECT * FROM `menulist` m WHERE m.parentid = $parentId AND m.status = '1'";
        $result = mysqli_query($this->conn, $sql);

        $data = [];
        while ($fetchData = mysqli_fetch_assoc($result)) {
            $data[] = $fetchData;
        }
        return $data;
    }
}
?>
