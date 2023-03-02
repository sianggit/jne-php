<?php

/**
 * JOB.php
 *
 * @category Class
 * @package  Agt\JNE
 *
 * @author   Anggit Pratama <anggitvz@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */

namespace Agt\JNE;

use Agt\JNE\Exceptions\ApiException;

/**
 * Class JOB
 *
 * @category Class
 * @package  Agt\JNE
 *
 * @author   Anggit Pratama <anggitvz@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */
class Pickup
{
    /**
     * Instantiate required parameters for Create JOB.
     *
     * @var array
     */
    const REQUIRED_PARAMETERS = [
              "PICKUP_NAME",
              "PICKUP_DATE",
              "PICKUP_TIME",
              "PICKUP_PIC",
              "PICKUP_PIC_PHONE",
              "PICKUP_ADDRESS",
              "PICKUP_DISTRICT",
              "PICKUP_CITY",
              "PICKUP_SERVICE",
              "PICKUP_VEHICLE",
              "BRANCH",
              "CUST_ID",
              "ORDER_ID",
              "SHIPPER_NAME",
              "SHIPPER_ADDR1",
              "SHIPPER_CITY",
              "SHIPPER_ZIP",
              "SHIPPER_REGION",
              "SHIPPER_CONTACT",
              "SHIPPER_PHONE",
              "RECEIVER_NAME",
              "RECEIVER_ADDR1",
              "RECEIVER_CITY",
              "RECEIVER_ZIP",
              "RECEIVER_REGION",
              "RECEIVER_CONTACT",
              "RECEIVER_PHONE",
              "ORIGIN_CODE",
              "DESTINATION_CODE",
              "SERVICE_CODE",
              "WEIGHT",
              "QTY",
              "GOODS_DESC",
              "GOODS_AMOUNT",
              "INSURANCE_FLAG",
              "SPECIAL_INS",
              "MERCHANT_ID",
              "TYPE",
              "AWB"
            ];

    /**
     * API for Pickup or Cashless.
     *
     * @param  array  $parameters
     *
     * @return object
     *
     * @throws \InvalidArgumentException
     * @throws ApiException
     */
    public static function create(array $parameters) : object
    {
        Validator::validateParams(self::REQUIRED_PARAMETERS, $parameters);
        
        $apiEndpoint = JNE::$baseUrl . '/pickupcashless';
        $sendRequest = HttpClient::sendRequest($apiEndpoint, 'POST', $parameters);
        $response = json_decode($sendRequest);

        if (!Validator::validateResponse($response)) {
            throw new ApiException($response->reason ?? $response->error, 500);
        }

        return $response;
    }
}
