<?php
use Chargily\ChargilyPay\Auth\Credentials;
use Chargily\ChargilyPay\ChargilyPay;
$credentials = new Credentials([
    "mode" => "test",
    "public" => "test_pk_jvEZhd4fKqU32gizuzaT12HwRlx8AGTVoMo1L0OD",
    "secret" => "test_sk_HW1Gm2NUg0HFT2uPrP7ktlx16IBbIwNWH4sS9pMX",
]);
$chargily_pay = new ChargilyPay($credentials);
$chargily_pay->balance()->get();
$chargily_pay->checkouts()->all();
$chargily_pay->customers()->all();
$chargily_pay->payment_links()->all();
$chargily_pay->prices()->all();
$chargily_pay->products()->all();
//validate and get Webhook details
$chargily_pay->webhook()->get();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $comment = $_POST['comment'];

    // Handle the data, e.g., save it to the databaset

    echo json_encode(["status" => "success", "message" => "Form submitted successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}