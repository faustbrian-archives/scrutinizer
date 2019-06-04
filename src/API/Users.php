<?php

declare(strict_types=1);

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plients\Scrutinizer\API;

use Plients\Http\HttpResponse;

class Users extends AbstractAPI
{
    /**
     * @param array $parameters
     *
     * @return \Plients\Http\HttpResponse
     */
    public function repositories(array $parameters = []): HttpResponse
    {
        return $this->client->get('user/repositories', $parameters);
    }

    /**
     * @return \Plients\Http\HttpResponse
     */
    public function configs(): HttpResponse
    {
        return $this->client->get('user/configs');
    }
}
