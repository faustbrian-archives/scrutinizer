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

namespace Plients\Scrutinizer\API\Organizations;

use Plients\Http\HttpResponse;
use Plients\Scrutinizer\API\AbstractAPI;
use Plients\Scrutinizer\Models\Config;

class Config extends AbstractAPI
{
    /**
     * @param string $organization
     *
     * @return \Plients\Http\HttpResponse
     */
    public function details(string $organization): HttpResponse
    {
        return $this->client->get("organizations/{$organization}/configs");
    }
}
