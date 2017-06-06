<?php

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Scrutinizer\Api\Organizations;

use BrianFaust\Unified\AbstractApi;
use BrianFaust\Scrutinizer\Models\Config;

class Config extends AbstractApi
{
    public function details($organization)
    {
        $response = $this->get("organizations/$organization/configs");

        return $this->getMapper()->raw($responses);
    }
}
