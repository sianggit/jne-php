<?php

/**
 * Tracking.php
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
 * Class Tracking
 *
 * @category Class
 * @package  Agt\JNE
 *
 * @author   Anggit Pratama <anggitvz@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */
class Tracking
{
    /**
     * Get tracking history of a package by its AWB Number.
     *
     * @param  string  $awbNumber
     *
     * @return object
     *
     * @throws \ArgumentCountError
     * @throws ApiException
     */
    public static function trace(string $awbNumber) : object
    {
        $apiEndpoint = JNE::$baseUrl . '/tracing/api/list/v1/cnote/' . $awbNumber;
        $sendRequest = HttpClient::sendRequest($apiEndpoint, 'POST');
        $response = json_decode($sendRequest);

        if (!Validator::validateResponse($response)) {
            throw new ApiException($response->error, 500);
        }

        return $response;
    }
}
