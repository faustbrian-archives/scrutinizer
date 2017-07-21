<?php

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Scrutinizer;

use BrianFaust\Http\Http;

class Client
{
    /**
     * @var string
     */
    private $accessToken;

    /**
     * Create a new client instance.
     *
     * @param string $accessToken
     */
    public function __construct(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Create a new API service instance.
     *
     * @param string $name
     *
     * @return \BrianFaust\Scrutinizer\API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $client = Http::withBaseUri("https://scrutinizer-ci.com/api/?access_token={$this->accessToken}");

        $class = "BrianFaust\\Scrutinizer\\API\\{$name}";

        return new $class($client);
    }
}
