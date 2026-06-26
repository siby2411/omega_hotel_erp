<?php
require_once 'BaseController.php';

class PersonnelController extends BaseController {
    
    public function personnel_index() {
        $personnel = $this->db()->query("SELECT * FROM personnel")->fetchAll();
        return $this->view('hotel/personnel_liste', ['personnel' => $personnel]);
    }

    public function personnel_create() {
        return $this->view('hotel/personnel_create');
    }
}
