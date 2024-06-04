<?php
class Task {
    private $name;
    private $description;
    private $status;
    private $date_creation;
    private $date_updated;
    private $user_name;

    // Constructor
    public function __construct($name, $description, $status, $date_creation, $date_updated, $user_name) {
        $this->name = $name;
        $this->description = $description;
        $this->status = $status;
        $this->date_creation = $date_creation;
        $this->date_updated = $date_updated;
        $this->user_name = $user_name;
    }

    // Getter methods
    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDateCreation() {
        return $this->date_creation;
    }

    public function getDateUpdated() {
        return $this->date_updated;
    }

    public function getUserId() {
        return $this->user_name;
    }

    // Setter methods
    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setDateCreation($date_creation) {
        $this->date_creation = $date_creation;
    }

    public function setDateUpdated($date_updated) {
        $this->date_updated = $date_updated;
    }

    public function setUserId($user_name) {
        $this->user_name = $user_name;
    }
}

