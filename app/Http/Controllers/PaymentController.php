<?php

namespace App\Http\Controllers;

use App\Services\PaymentInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $PaymentProcess;

    public function __construct(PaymentInterface $PaymentProcess)
    {
        $this->PaymentProcess = $PaymentProcess;
    }

    public function processPayment()
    {
        $this->PaymentProcess->Processpayment(100);
    }
}
