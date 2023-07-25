<?php

class MenuOrganizer
{
    private $menuListRepository;
    private $data;
    private $data2;

    public function __construct($menuListRepository)
    {
        $this->menuListRepository = $menuListRepository;
    }

    public function fetchMenuData()
    {
        $this->data = $this->menuListRepository->getMenuItemsByParentId(0);

        foreach ($this->data as $d) {
            $this->data2[$d['id']] = $this->menuListRepository->getMenuItemsByParentId($d['id']);
        }

        $this->organizeMenuData();
    }

    private function organizeMenuData()
    {
        foreach ($this->data as &$d) {
            $arr = [];
            foreach ($this->data2[$d['id']] as $fetchData) {
                if ($d['id'] == $fetchData['parentid']) {
                    $arr[] = $fetchData;
                }
            }
            $d['child'] = $arr;
        }
        unset($d); // Unset the reference after the loop to avoid unintended modifications
    }

    public function getMenuData()
    {
        return $this->data;
    }
}
?>
