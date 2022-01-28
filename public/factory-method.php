<?php
abstract class PaymentOnlines
{
    abstract public function getPaymentMethod(): PaymentMethod;
}
class BaoKimCreator extends PaymentOnlines
{
    public function getPaymentMethod(): PaymentMethod
    {
        return new BaoKim();
    }
}
class VnPayCreator extends PaymentOnlines
{
    public function getPaymentMethod(): PaymentMethod
    {
        return new VnPay();
    }
}
interface PaymentMethod
{
   
}
class BaoKim implements PaymentMethod
{

}
class VnPay implements PaymentMethod
{
    
}

function clientCode(PaymentOnlines $creator)
{
    return $creator->getPaymentMethod();
}
$method = clientCode(new VnPayCreator);
echo '<pre>'; var_dump($method); die;