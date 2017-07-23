<?php

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Scrutinizer\API\Organizations;

use BrianFaust\Http\HttpResponse;
use BrianFaust\Scrutinizer\Models\Config;
use BrianFaust\Scrutinizer\API\AbstractAPI;

class Config extends AbstractAPI
{
    /**
     * @param string $organization
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function details(string $organization): HttpResponse
    {
        return $this->client->get("organizations/{$organization}/configs");
    }
}
