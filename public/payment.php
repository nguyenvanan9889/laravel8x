<?php
abstract class PaymentOnlineMethods
{
    
}
class BaoKim extends PaymentOnlineMethods
{
    
}
class OnePay extends PaymentOnlineMethods
{
    
}
class OnePayDomestic extends OnePay {

}
class OnePayInternation extends OnePay {
    
}
class Factory {
    public function getPaymentMethod(string $method)
    {
        if ($method == 'baokim') {
            return new BaoKim;
        }
        if ($method == 'onepaydomestic') {
            return new OnePayDomestic;
        }
        if ($method == 'onepayinternation') {
            return new OnePayInternation;
        }
        throw new Exception("Payment method not exists");
    }
}
$paymentMethod = (new Factory)->getPaymentMethod('onepaydomestic');
echo '<pre>'; var_dump($paymentMethod); die;