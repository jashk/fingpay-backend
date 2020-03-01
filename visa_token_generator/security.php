<?php

define ('HMAC_SHA256', 'sha256');
define ('SECRET_KEY', '5d9bda171675424bb600f7a18d0d2bab0badf4a78b604745acc50b5f01ca4ae56d2a4675d50a448b87e84514051dfe5c8bd28d4d312340eb9a9ff02d7840560906bdb6fd6d2647b5a7f8b9b95909645379992f673313409ca611e56b846704d509db0809f4c14f3080819ef161ecccfc42d56c6eb4954c2b94d44eda71278b0e');

function sign ($params) {
  return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
           $dataToSign[] = $field . "=" . $params[$field];
        }
        return commaSeparate($dataToSign);
}

function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}

?>
