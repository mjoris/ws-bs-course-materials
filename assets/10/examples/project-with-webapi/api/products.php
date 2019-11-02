<?php

require_once '../includes/config.php';
require_once '../includes/functions.php';
require_once '../includes/WebAPIEndpoint.php';

class ProductsEndPoint extends WebAPIEndpoint {
    protected $db;

    public function __construct() {
        $this->db = getDatabase();
    }

    protected function get($urlParams, $bodyParams) {
        if (!$bodyParams) {
            if (!$urlParams) {
                $stmt = $this->db->prepare('SELECT id, title, price, quantity FROM products');
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return ['products' => $products];
            } else if (isset($urlParams['id'])) {
                $id = $urlParams['id'];
                $stmt = $this->db->prepare('SELECT id, title, price, quantity FROM products WHERE id = ?');
                $stmt->execute([$id]);
                $product = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($product)
                    return $product;
                else {
                    http_response_code(404); // 404 Not Found.
                    return ['message' => 'Product does not exist.'];
                }
            }
        }
        http_response_code(400); // 400 Bad Request
        return ['message' => 'Unable to create product. Malformed request.'];
    }

    protected function post($urlParams, $bodyParams) {
        if (!$urlParams) {
            $title = $bodyParams['title'] ?? false;
            $price = $bodyParams['price'] ?? false;
            $quantity = $bodyParams['quantity'] ?? false;
            if (($title !== false) && ($price !== false) && ($quantity !== false)) {

                $description = $bodyParams['description'] ?? ''; // optional

                // validation
                $errorList = [];
                if (strlen($title) === 0) {
                    $errorList[] = 'Title must not be empty.';
                }
                if (! is_numeric($price)) {
                    $errorList[] = 'Price must be numeric.';
                }
                if (filter_var($quantity, FILTER_VALIDATE_INT) === false) {
                    $errorList[] = 'Quantity must be integer.';
                }

                if (!$errorList) {
                    $stmt = $this->db->prepare('INSERT INTO products (title, price, quantity, description, added_on) VALUES (?, ?, ?, ?, ?)');
                    $stmt->execute([$title, $price, $quantity, $description, (new DateTime())->format('Y-m-d H:i:s')]);

                    if ($stmt->rowCount() > 0) {
                        http_response_code(201); // 201 Created
                        return ['message' => 'Product has been created.'];
                    } else {
                        http_response_code(503); // 503 Service Unavailable
                        return ['message' => 'Unable to create product.'];
                    }
                } else {
                    http_response_code(422); // 422 Unprocessable Entity
                    return ['messages' => $errorList];
                }

            }
        }
        http_response_code(400); // 400 Bad Request
        return ['message' => 'Unable to create product. Malformed request.'];

    }

}

$pep = new ProductsEndPoint();
$pep->run();