<?php
namespace Api\Controller;

use Api\Model\ModelERP;
use Api\Model\ModelSendResponse;

class ControllerERP
{
    public function getCustomers(): void {
        $instanceModelERP = new ModelERP;
        $customers = $instanceModelERP->getCustomers();
        ModelSendResponse::sendResponse($customers);
    }
}