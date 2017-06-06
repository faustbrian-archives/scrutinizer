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

class Reports extends AbstractApi
{
    public function all($username, $repo, $type, $parameters = [])
    {
        $requestUrls = [
            'github' => "repositories/g/$username/$repo/reports",
            'bitbucket' => "repositories/b/$username/$repo/reports",
            'plain' => "repositories/gp/$repo/reports",
        ];

        $response = $this->get($requestUrls[$type], $parameters);

        return [
            'meta' => array_except($response, '_embedded'),
            'results' => $this->getMapper()->raw($response['_embedded']['reports']),
        ];
    }

    public function details($username, $repo, $date, $type)
    {
        $requestUrls = [
            'github' => "repositories/g/$username/$repo/reports/$date",
            'bitbucket' => "repositories/b/$username/$repo/reports/$date",
            'plain' => "repositories/gp/$repo/reports/$date",
        ];

        $response = $this->get($requestUrls[$type]);

        return $this->getMapper()->raw($response);
    }
}
