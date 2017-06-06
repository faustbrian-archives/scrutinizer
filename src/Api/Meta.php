<?php

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Scrutinizer\Api;

use BrianFaust\Unified\AbstractApi;
use BrianFaust\Scrutinizer\Models\Meta;

class Meta extends AbstractApi
{
    public function details()
    {
        $response = $this->get('meta');

        return $this->getMapper()->raw($response);
    }
}
