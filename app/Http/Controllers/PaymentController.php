<?php

namespace App\Http\Controllers;

use App\Services\PaymentInterface;
use Illuminate\Http\Request;
use App\Events\MovieTicket;

class PaymentController extends Controller
{
    private $PaymentProcess;

    public function __construct(PaymentInterface $PaymentProcess)
    {
        $this->PaymentProcess = $PaymentProcess;
    }

    public function processPayment()
    {
        event(new MovieTicket(['test',123]));
        // dd(444);
        // $this->PaymentProcess->Processpayment(100);
    }
}
