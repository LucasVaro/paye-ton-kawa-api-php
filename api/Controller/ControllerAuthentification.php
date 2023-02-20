<?php
namespace Api\Controller;

use chillerlan\QRCode\QRCode;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Api\Model\ModelSendResponse;
use Api\Model\ModelMail;

class ControllerAuthentification {
    public function getKey() {
        $mail = $_POST['mail'];
        $payload = PAYLOAD_KEY;
        $payload['mail'] = $mail;
        $jwt = JWT::encode($payload, PRIVATE_KEY, 'RS256');
        $bodyMail = "<h4>Voici le qrcode pour vous authentifier sur l'application mobile.</h4>";
        $qrcode = (new QRCode)->render($jwt);
        $instanceModelMail = new ModelMail;
        $isSend = $instanceModelMail->sendMail($mail, $bodyMail, $qrcode);
        $arrayToClient = array("token" => $jwt, "mail" => $mail, "mailSend" => $isSend);
        ModelSendResponse::sendResponse($arrayToClient);
    }

    public function checkKey($apiKey) {
        $isAuthentificate = false;
        try {
            $decoded = JWT::decode($apiKey, new Key(PUBLIC_KEY, 'RS256'));
            $auth = $decoded->key;
            if ($auth === PAYLOAD_KEY['key']) {
                $isAuthentificate = true;
            }
        } catch (\Exception $e) {
            $isAuthentificate = false;
        }
        return $isAuthentificate;
    }
}