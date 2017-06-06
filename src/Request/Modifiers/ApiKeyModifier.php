<?php

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Scrutinizer\Request\Modifiers;

use BrianFaust\Contracts\HttpClient;
use BrianFaust\Modifiers\AbstractModifier;

class ApiKeyModifier extends AbstractModifier
{
    public function apply()
    {
        $apiKey = $this->httpClient->getConfig('apiKey');

        $this->httpClient->addQuery('apikey', $apiKey);

        return $this->httpClient;
    }
}
