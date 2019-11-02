<?php

require_once '../includes/WebAPIEndpoint.php';

class LecturersEndPoint extends WebAPIEndpoint {

    private $lecturers = [1 => ['id' => 1, 'name' => 'Joris Maervoet'],
                          2 => ['id' => 2, 'name' => 'Pieter Van Peteghem']];

    protected function get($urlParams, $bodyParams) {
        if (! isset($urlParams['id'])) {
            return ['lecturers' => array_values($this->lecturers)];
        }  else {
            $id = $urlParams['id'];
            if (array_key_exists($id, $this->lecturers)) {
                return $this->lecturers[$id];
            } else {
                http_response_code(404); // 404 Not Found.
                return ['message' => 'Lecturer not found.'];
            }
        }
    }
}

$lep = new LecturersEndPoint();
$lep->run();