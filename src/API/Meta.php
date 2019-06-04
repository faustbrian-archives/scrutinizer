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
use Plients\Http\HttpResponse;
use Plients\Scrutinizer\Models\Meta;

class Meta extends AbstractAPI
{
    /**
     * @return \Plients\Http\HttpResponse
     */
    public function details(): HttpResponse
    {
        return $this->client->get('meta');
    }
}
