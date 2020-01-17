<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('payumoney-test/return', function () {
    $result = \Payumoney::completePay($_POST);

    dd($result->getParams());
});

Route::get('/', function () {
    // All of these parameters are required!
    // Redirects to PayUMoney
    \Payumoney::pay([
        'txnid'       => 'A_UNIQUE_TRANSACTION_ID',
        'amount'      => 10.50,
        'productinfo' => 'A book',
        'firstname'   => 'Peter',
        'email'       => 'abc@example.com',
        'phone'       => '1234567890',
        'surl'        => url('payumoney-test/return'),
        'furl'        => url('payumoney-test/return'),
    ])->send();


    // In the return method of controller
    // $result = \Payumoney::completePay($_POST);

    // if ($result->checksumIsValid() and $result->isSuccess()) {
    //     print 'Payment was successful.';
    // } else {
    //     print 'Payment was not successful.';
    // }




    // $result = \Payumoney::completePay($_POST);

    // // Returns Complete, Pending, Failed or Tampered
    // $result->getStatus();

    // // Returns an array of all the parameters of the transaction
    // $result->getParams();

    // // Returns the ID of the transaction
    // $result->getTransactionId();

    // // Returns true if the checksum is correct
    // $result->checksumIsValid();
});
