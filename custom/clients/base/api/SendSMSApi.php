<?php

/**
 * Copyright 2015 Jeff Bickart
 *
 * User: @bickart
 * Date: 09/16/2015
 * Time: 12:21 PM
 *
 */
class SendSMSApi extends SugarApi
{
    public function registerApiRest()
    {
        return array(
            'sendSMSMessage' => array(
                //request type
                'reqType' => 'POST',
                //endpoint path
                'path' => array('sms', 'send'),
                //endpoint variables
                'pathVars' => array('', ''),
                //method to call
                'method' => 'sendMessage',
                //short help string to be displayed in the help documentation
                'shortHelp' => 'Send an SMS Message',
                //long help to be displayed in the help documentation
                'longHelp' => 'custom/include/externalAPI/Plivo/help/sendMessage.html',
                //Validate that the user has a login ID
                // 'noLoginRequired' => false,
                // 'keepSession' => false,

            ),
            'getSMSMessage' => array(
                //request type
                'reqType' => 'GET',
                //endpoint path
                'path' => array('sms', '?'),
                //endpoint variables
                'pathVars' => array('', 'record'),
                //method to call
                'method' => 'getMessage',
                //short help string to be displayed in the help documentation
                'shortHelp' => 'Get Detail about an SMS Message',
                //long help to be displayed in the help documentation
                'longHelp' => 'custom/include/externalAPI/Plivo/help/sendMessage.html',
                //Validate that the user has a login ID
                // 'noLoginRequired' => false,
                // 'keepSession' => false,

            )

        );
    }

    public function sendMessage(ServiceBase $api, array $args)
    {

        $this->requireArgs($args, array('dst_phone', 'message'));

        $api = ExternalAPIFactory::loadAPI('Plivo', true);
        return $api->sendMessage($args['dst_phone'], $args['message']);
    }

    public function getMessage(ServiceBase $api, array $args)
    {

        $this->requireArgs($args, array('record'));

        $api = ExternalAPIFactory::loadAPI('Plivo', true);
        return $api->getMessageDetail($args['record']);
    }
}


