<?php

interface StandardPaymentInterface {
    public function pay();
}

interface FraudCheckInterface {
    public function fraudCheck();
}

interface ThreeDSecureCheckInterface {
    public function ThreeDCheck();
}

interface PaymentProcessInterface {
    public function process();
}

class PayFee implements StandardPaymentInterface, PaymentProcessInterface, ThreeDSecureCheckInterface {
    public function pay() {}
    public function ThreeDCheck() { }
    public function process() {
        $this->ThreeDCheck();
        $this->pay();
    }

}

class WorldFee implements StandardPaymentInterface, PaymentProcessInterface {
    public function pay() {}
    public function process() {
        $this->pay();
    }
}

class MintFee implements StandardPaymentInterface, FraudCheckInterface, PaymentProcessInterface {
    public function pay() {}
    public function fraudCheck() {}
    public function process() {
        $this->fraudCheck();
        $this->pay();
    }
}

class PaymentGateway {
    public function takePayment(PaymentProcessInterface $paymentType) {
        $paymentType->process();
    }
}

$paymentType = new PayFee();
$gateway = new PaymentGateway();
$gateway->takePayment($paymentType);


?>