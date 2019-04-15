<?php

interface StandardPaymentInterface {
    public function pay();
}

interface TransactionCheckInterface {
    public function fraudCheck();
}

class PayFee implements StandardPaymentInterface {
    public function pay() {}
}

class WorldFee implements StandardPaymentInterface {
    public function pay() {}
}

class MintFee implements StandardPaymentInterface, TransactionCheckInterface {
    public function pay() {}
    public function fraudCheck() {

    }
}

class PaymentGateway {
    public function takePayment(StandardPaymentInterface $paymentType) {
        $paymentType->fraudCheck();
        $paymentType->pay();
    }
}

$paymentType = new PayFee();
$gateway = new PaymentGateway();
$gateway->takePayment($paymentType);


?>