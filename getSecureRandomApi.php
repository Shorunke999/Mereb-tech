<?php

require_once 'utils.php';
use General\Utils;

try {
    $min = isset($_GET['min']) ? (int)$_GET['min'] : null;
    $max = isset($_GET['max']) ? (int)$_GET['max'] : null;

    if ($min === null || $max === null || $min > $max) {
        http_response_code(400);
        echo json_encode(["error" => "Invalid range. Ensure 'min' and 'max' are integers and 'min <= max'."]);
        exit;
    }
    $randomNumber = Utils::getSecureRandom($min, $max);
    echo json_encode(["randomNumber" => $randomNumber]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "An error occurred while generating the random number."]);
}
