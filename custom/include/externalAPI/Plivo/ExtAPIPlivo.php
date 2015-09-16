<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/externalAPI/Base/ExternalAPIBase.php');
require_once('custom/include/externalAPI/Plivo/vendor/autoload.php');

class ExtAPIPlivo extends ExternalAPIBase
{
    public $connector = "ext_rest_plivo";

    var $authId;
    var $authToken;
    var $srcPhone;
    var $logger;
    var $service;
    var $phoneUtil;

    function __construct()
    {
        $this->authId = trim($this->getConnectorParam('auth_id'));
        $this->authToken = trim($this->getConnectorParam('auth_token'));
        $this->srcPhone = trim($this->getConnectorParam('src_phone'));
        $this->logger = LoggerManager::getLogger();
        $this->service = Bickart\Plivo\PlivoService::make($this->authId, $this->authToken);
        $this->phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

    }

    function getAccountDetails()
    {
        return $this->service->account()->getDetails();
    }

    function sendMessage($dst, $message)
    {
        try {
            $usNumberProto = $this->phoneUtil->parse($dst, "US");
            if ($this->phoneUtil->isValidNumber($usNumberProto)) {
                //echo $this->phoneUtil->format($usNumberProto, \libphonenumber\PhoneNumberFormat::E164);

                return $this->service->message()->send(
                    $this->srcPhone,
                    $this->phoneUtil->format($usNumberProto, \libphonenumber\PhoneNumberFormat::E164),
                    $message
                );
            }

            throw new \Bickart\Plivo\Exceptions\PlivoException("Invalid Destination Phone Number");
        } catch (\libphonenumber\NumberParseException $e) {
            var_dump($e);
        }

    }

    function getMessageDetail($id) {
        $GLOBALS['log']->fatal($id);
        return $this->service->message()->getById($id);
    }
}
