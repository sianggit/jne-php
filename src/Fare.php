<?php

/**
 * Fare.php
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
 * Class Fare
 *
 * @category Class
 * @package  Agt\JNE
 *
 * @author   Anggit Pratama <anggitvz@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */
class Fare
{
    /**
     * Instantiate required parameters for Get Fares.
     *
     * @var array
     */
    const REQUIRED_PARAMETERS = ['from', 'thru', 'weight'];

    /**
     * Get available fares based on origin code and destination code.
     *
     * @param  array  $parameters
     *
     * @return object
     *
     * @throws \InvalidArgumentException
     * @throws ApiException
     */
    public static function getFares(array $parameters) : object
    {
        Validator::validateParams(self::REQUIRED_PARAMETERS, $parameters);

        $apiEndpoint = JNE::$baseUrl . '/tracing/api/pricedev';
        $sendRequest = HttpClient::sendRequest($apiEndpoint, 'POST', $parameters);
        $response = json_decode($sendRequest);

        if (!Validator::validateResponse($response)) {
            throw new ApiException($response->error, 500);
        }

        return $response;
    }
}
