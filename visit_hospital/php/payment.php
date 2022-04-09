<?php

class Payment
{
    public $headers;
    public $consumer_keys;
    public $consumer_secret;
    private $access_token;
    public $request_headers;

    function __construct(){
        $this->consumer_keys = 'gtQZGSDVoYA3GgnA7o0tu6NAfnUAeeCJ';
        $this->consumer_secret = 'HxIOtWmnI2hBLEAZ';
        $this->access_token = $this->get_access_token();
    }

    private function get_access_token(){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
        $credentials = base64_encode("$this->consumer_keys:$this->consumer_secret");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $curl_response = curl_exec($curl);

        $json_decode = json_decode($curl_response);
        $access_token = ($json_decode) ? $json_decode->access_token : false ;
        return $access_token;
    }

    public function pay_body($endpoint,$curl_post_data){
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $endpoint);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->access_token)); //setting custom header
      $data_string = json_encode($curl_post_data);

      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

      $curl_response = curl_exec($curl);
      return json_decode($curl_response);

    }
    public function makeTransaction($Amount,$PhoneNumber,$TransactionDesc,$CallBackURL){

         $BusinessShortCode = '174379';
         $Timestamp = date("Ymdhis");
         $AccountReference = $PhoneNumber;
         $PassKey = 'MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMTYwMjE2MTY1NjI3';
         $Password = base64_encode($BusinessShortCode.$PassKey.$Timestamp);

         $curl_post_data = array(
             //Fill in the request parameters with valid values
             'BusinessShortCode' => $BusinessShortCode,
             'Password' => $Password,
             'Timestamp' => $Timestamp,
             'TransactionType' => 'CustomerPayBillOnline',
             'Amount' => $Amount,
             'PartyA' => $PhoneNumber,
             'PartyB' => $BusinessShortCode,
             'PhoneNumber' => $PhoneNumber,
             'CallBackURL' => $CallBackURL,
             'AccountReference' => $AccountReference,
             'TransactionDesc' => $TransactionDesc
         );
         $kata = $this->pay_body('https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest',$curl_post_data);
        return $kata;
    }
}

?>