<?php
namespace App\Isop;
use Illuminate\Support\Facades\Facade;
class TicketFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'isop';
    }
}
