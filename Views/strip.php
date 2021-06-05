<?php
require_once('/assets/stripe-php-7.82.0/init.php'); // Ne pas oublier cte ligne +modifier lien vers la bonne librairie

\Stripe\Stripe::setApiKey("sk_test_51IyypYGc9T6D4Xa9C5Y2Ypke3QmSsyKX2N1nCjgLIAXqpZVFQZ4AR9FHBHjGHxmy4eI5OQzt8K2NTql8wIgC4Q0c00vnBLSKZx");

$token  = $_POST['stripeToken'];
$email  = $_POST['stripeEmail'];

$customer = \Stripe\Customer::create(array(
    'email' => $email,
    'source'  => $token
));

$charge = \Stripe\Charge::create(array(
    'customer' => $customer->id,
    'amount'   => 500,
    'currency' => 'eur',
    'description' => 'Discover France Guide by Erasmus of Paris',
    'receipt_email' => $email
));

echo '<h1>Payment accepted!</h1>';
?>