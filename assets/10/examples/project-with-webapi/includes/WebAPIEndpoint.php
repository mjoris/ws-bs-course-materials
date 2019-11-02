<?php

/**
 * Extend WebAPIEndpoint in order to create a Web API endpoint.
 * In the child class, implement a method for any of the HTTP request methods
 * your endpoint should support e.g.
 *   function get($urlParams, $bodyParams)
 *   function pull($urlParams, $bodyParams)
 * In order to activate the endpoint,
 *   (1) make an instance of the child class
 *   (2) call the method run() on the instance
 *
 * @author		Joris Maervoet
 * @copyright	Copyright (c), 2019 Joris Maervoet
 */
abstract class WebAPIEndpoint
{
    public function run() {

        // Identify the HTTP request method (GET, POST, PULL, ...)
        $httpMethod = $_SERVER['REQUEST_METHOD'];

        // Parse the HTTP request body assuming it contains plain JSON
        // (If you want to parse application/x-www-form-urlencoded, use parse_str().)
        $httpBody = json_decode(file_get_contents('php://input'), true);

        // Does an instance of this class contain a method called get(), post(), pull() ...?
        if (method_exists($this, strtolower($httpMethod))) {

            // if so, call this method
            $answer = call_user_func(array($this, strtolower($httpMethod)), $_GET, $httpBody);
        } else {

            // HTTP response code 405 Method Not Allowed (http_response_code() supports any version of HTTP)
            http_response_code(405);
            $answer = ['message' => 'HTTP request method ' .  $httpMethod . ' not allowed.'];
        }

        // set the Content-type header of the HTTP response to JSON
        header('Content-type: application/json; charset=UTF-8');

        // and encode the answer into JSON
        echo json_encode($answer);
        exit;
    }

}