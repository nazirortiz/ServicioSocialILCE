<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/pruebasnetbeans/resources/openpay-1.2.0/Openpay.php');

class Openpay_client {

    var $openpay;

    function __construct() {

        Openpay::setId('mkdpug0wfx2eqcsp1e7i');
        Openpay::setApiKey('sk_694d4ac2ead64f8ca281490e127773e4');
        Openpay::setProductionMode(false);
        $this->openpay = Openpay::getInstance('mkdpug0wfx2eqcsp1e7i', 'sk_694d4ac2ead64f8ca281490e127773e4');
    }

    function add_comision(){
        
        $feeData = array(
            'customer_id' => 'amz7cjuwfpp084cxj8qq',
            'amount' => 3000,
            'description' => 'Cobro de Comisión',
            'order_id' => 'ORDEN-00063');
        
        $fee = $this->openpay->fees->create($feeData);
    }

    function add_payout(){

        $payoutData = array(
            'method' => 'card',
            'destination_id' => 'triujamotmz8dfjlvgvc',
            'amount' => 4000,
            'description' => 'Retiro de saldo semanal',
            'order_id' => 'ORDEN-00062');
        
        $customer = $this->openpay->customers->get('amz7cjuwfpp084cxj8qq');
        $payout = $customer->payouts->create($payoutData);
    }

    function add_card(){

        $cardData = array(
            'holder_name' => 'Dario Rodriguez',
            'card_number' => '4242952613535816',
            'cvv2' => '123',
            'expiration_month' => '12',
            'expiration_year' => '20',
            'address' => array(
                    'line1' => 'Privada Rio No. 12',
                    'line2' => 'Co. El Tintero',
                    'line3' => '',
                    'postal_code' => '76920',
                    'state' => 'Querétaro',
                    'city' => 'Querétaro.',
                    'country_code' => 'MX'));
        
        $customer = $this->openpay->customers->get('amz7cjuwfpp084cxj8qq');
        $card = $customer->cards->add($cardData);
    }

    function add_costumer() {

        $customerData = array(
            'name' => 'Dario',
            'last_name' => 'Rodriguez',
            'email' => 'dario.openpay@yopmail.com',
            'phone_number' => '5526755939',
            'address' => array(
                    'line1' => 'Sur 103 A 642',
                    'line2' => 'Col. Sector Popular',
                    'line3' => '',
                    'postal_code' => '09060',
                    'state' => 'Ciudad de México',
                    'city' => 'Ciudad de México',
                    'country_code' => 'MX'));
        
        $customer = $this->openpay->customers->add($customerData);

        return $customer;
    }

    function delete_customer(){

        $customer = $this->openpay->customers->get('ac4npr5bodljrsevl0jw');
        $customer->delete();
    }

    function add_card_to_customer($customer) {

        $cardData = array(
            'holder_name' => 'Dario Rodriguez',
            'card_number' => '4916394462033681',
            'cvv2' => '123',
            'expiration_month' => '12',
            'expiration_year' => '15',
            'address' => array(
                    'line1' => 'Sur 103 A 642',
                    'line2' => 'Col. Sector Popular',
                    'line3' => '',
                    'postal_code' => '09060',
                    'state' => 'Ciudad de México',
                    'city' => 'Ciudad de México.',
                    'country_code' => 'MX'));

        $card = $customer->cards->add($cardData);
        
        return $card;
    }
}