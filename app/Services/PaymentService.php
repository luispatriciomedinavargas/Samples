<?php


namespace App\Services;


class PaymentService
{


    public function paypal(){
        $User = env('PayPalID','');
        $Pass = env('secreKey','');
        return [$User,$Pass];
    }


    public function otherImplementation(){
        return'from paypal';
    }

    


}