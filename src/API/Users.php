<?php

declare(strict_types=1);

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Scrutinizer\API;

use BrianFaust\Http\HttpResponse;

class Users extends AbstractAPI
{
    /**
     * @param array $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function repositories(array $parameters = []): HttpResponse
    {
        return $this->client->get('user/repositories', $parameters);
    }

    /**
     * @return \BrianFaust\Http\HttpResponse
     */
    public function configs(): HttpResponse
    {
        return $this->client->get('user/configs');
    }
}
