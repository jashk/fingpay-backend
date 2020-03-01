<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VisaController extends AbstractController
{
    private $HMAC_SHA256 = 'sha256';
    private $SECRET_KEY = '5d9bda171675424bb600f7a18d0d2bab0badf4a78b604745acc50b5f01ca4ae56d2a4675d50a448b87e84514051dfe5c8bd28d4d312340eb9a9ff02d7840560906bdb6fd6d2647b5a7f8b9b95909645379992f673313409ca611e56b846704d509db0809f4c14f3080819ef161ecccfc42d56c6eb4954c2b94d44eda71278b0e';

    /**
     * @Route("/visa", name="visa")
     */
    public function index()
    {
        $uniqid = uniqid();
        $gmdate = gmdate("Y-m-d\TH:i:s\Z");
        $params = [
            'access_key' => '05c6b2da80333967b24e82d010d45d27',
            'profile_id' => 'C052110F-8D7C-4C4B-B0BE-31B4EAC49499',
            'transaction_uuid' => uniqid(),
            'signed_field_names' => 'access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency',
            'unsigned_field_names' => '',
            'signed_date_time' => gmdate("Y-m-d\TH:i:s\Z"),
            'locale' => 'en',
            'transaction_type' => 'create_payment_token',
            'reference_number' => uniqid(),
            'amount'=> '20.00',
            'currency' => 'MXN'
        ];


        return $this->render('visa/index.html.twig', [
            'controller_name' => 'VisaController',
            'params' => $params,
            'signature' => $this->sign($params)
        ]);
    }

    
    private function sign ($params) {
      return $this->signData($this->buildDataToSign($params), $this->SECRET_KEY);
    }
    
    private function signData($data, $secretKey) {
        return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
    }
    
    private function buildDataToSign($params) {
            $signedFieldNames = explode(",",$params["signed_field_names"]);
            foreach ($signedFieldNames as $field) {
               $dataToSign[] = $field . "=" . $params[$field];
            }
            return $this->commaSeparate($dataToSign);
    }
    
    private function commaSeparate ($dataToSign) {
        return implode(",",$dataToSign);
    }
    
}
