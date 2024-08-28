<?php

namespace App\Http\Controllers;

use App\Services\PaymentInterface;
use Illuminate\Http\Request;
use App\Events\MovieTicket;
use App\Models\Test\Auditoriam;
use App\Models\Test\AuditoriamSeat;
use Weather;

class PaymentController extends Controller
{
    private $PaymentProcess;

    public function __construct(PaymentInterface $PaymentProcess)
    {
        $this->PaymentProcess = $PaymentProcess;
    }

    public function processPayment()
    {
        // event(new MovieTicket(['test',123]));
        // dd(444);
        $weather = Weather::getWeathers('New York');
        dd($weather);
        // $this->PaymentProcess->Processpayment(100);
    }
    public function ormtest(){
        $auditorium = Auditoriam::with(['seatdetail' => function ($query) {
            $query->where('quantity', 500);
        }])->get();

        // foreach ($auditorium as $key => $value) {
        //     dd($value->seatdetail);
        // }
        // dd(AuditoriamSeat::find(1)->audiname()->first());
        // dd(AuditoriamSeat::find(2)->audiname()->first());       
    }
}
