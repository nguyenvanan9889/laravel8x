<?php
class AccountService
{
	public function getAccount(string $email)
	{
		echo "Getting the account of ".$email.'<br>';
	}
}
class PaymentService
{
	public function paymentByPaypal()
	{
		echo "Payment by Paypal".'<br>';
	}
	public function paymentByCreditCard()
	{
		echo "Payment by Credit Card".'<br>';
	}
	public function paymentByEbankingAccount()
	{
		echo "Payment by E-banking account".'<br>';
	}
	public function paymentByCash()
	{
		echo "Payment by cash".'<br>';
	}
}
class ShippingService
{
	public function freeShipping()
	{
		echo "Free Shipping".'<br>';
	}
	public function standardShipping()
	{
		echo "Standard Shipping".'<br>';
	}
	public function expressShipping()
	{
		echo "Express Shipping".'<br>';
	}
}
class EmailService
{
	public function sendMail(string $mailTo)
	{
		echo "Sending an email to ". $mailTo.'<br>';
	}
}
class SmsService
{
	public function sendSMS(string $mobilePhone)
	{
		echo "Sending an mesage to". $mobilePhone.'<br>';
	}
}
class ShopFacade
{
	private static $instance = null;
	private AccountService $accountService;
	private PaymentService $paymentService;
	private ShippingService $shippingService;
	private EmailService $emailService;
	private SmsService $SmsService;
	private function __construct()
	{
		$this->accountService = new AccountService;
		$this->paymentService = new PaymentService;
		$this->shippingService = new ShippingService;
		$this->emailService = new EmailService;
		$this->smsService = new SmsService;
	}
	public static function getInstance()
	{
		if (self::$instance == null) {
			return self::$instance = new self;
		}
		return self::$instance;
	}
	public function buyProductByCashWithFreeShipping(string $email)
	{
		$this->accountService->getAccount($email);
		$this->paymentService->paymentByCash();
		$this->shippingService->freeShipping();
		$this->emailService->sendMail($email);
		echo "Done!".'<br>';
	}
	public function buyProductByPaypalWithStandardShipping(string $email, string $mobilePhone)
	{
		$this->accountService->getAccount($email);
		$this->paymentService->paymentByPaypal();
		$this->shippingService->standardShipping();
		$this->emailService->sendMail($email);
		$this->smsService->sendSMS($mobilePhone);
		echo "Done!".'<br>';
	}
}
class Client
{
	public function main()
	{
		ShopFacade::getInstance()->buyProductByCashWithFreeShipping('nguyenvanan9889@gmail.com');
		echo '================<br>';
		ShopFacade::getInstance()->buyProductByPaypalWithStandardShipping('nguyenvanan9889@gmail.com', '0989721999');
	}
}
// $client = new Client;
// $client->main();

// ========================================

class Facade
{
	public function __construct(private Bios $bios, private OperatingSystem $os)
	{
		
	}
	public function turnOn()
	{
		$this->bios->execute();
		$this->bios->waitForKeyPress();
		$this->bios->launch($this->os);
	}
	public function turnOff()
	{
		$this->os->halt();
		$this->bios->powerDown();
	}
}
interface OperatingSystem {
	public function halt();
	public function getName();
}
interface Bios {
	public function execute();
	public function waitForKeyPress();
	public function launch(OperatingSystem $os);
	public function powerDown();
}