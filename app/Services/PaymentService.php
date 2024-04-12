<?php
namespace App\Services;
use App\Services\PaymentInterface;

class PaymentService implements PaymentInterface{
    public function Processpayment($amount) {
        echo '====';
    }
}