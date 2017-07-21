<?php

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
use BrianFaust\Http\HttpResponse;
use BrianFaust\Scrutinizer\Models\Meta;

class Meta extends AbstractAPI
{
    /**
     * @return \BrianFaust\Http\HttpResponse
     */
    public function details(): HttpResponse
    {
        return $this->client->get('meta');
    }
}
