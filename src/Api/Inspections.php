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

class Inspections extends AbstractApi
{
    public function all($username, $repo, $type, $parameters = [])
    {
        $requestUrls = [
            'github' => "repositories/g/$username/$repo/inspections",
            'bitbucket' => "repositories/b/$username/$repo/inspections",
            'plain' => "repositories/gp/$repo/inspections",
        ];

        $response = $this->get($requestUrls[$type], $parameters);

        return [
            'meta' => array_except($response, '_embedded'),
            'results' => $this->getMapper()->raw($response['_embedded']['inspections']),
        ];
    }

    public function details($username, $repo, $uuid, $type)
    {
        $requestUrls = [
            'github' => "repositories/g/$username/$repo/inspections/$uuid",
            'bitbucket' => "repositories/b/$username/$repo/inspections/$uuid",
            'plain' => "repositories/gp/$repo/inspections/$uuid",
        ];

        $response = $this->get($requestUrls[$type]);

        return $this->getMapper()->raw($response);
    }

    public function create($username, $repo, $type, $parameters = [])
    {
        $requestUrls = [
            'github' => "repositories/g/$username/$repo/inspections",
            'bitbucket' => "repositories/b/$username/$repo/inspections",
            'plain' => "repositories/gp/$repo/inspections",
        ];

        $response = $this->post($requestUrls[$type], $parameters);

        return $this->getMapper()->raw($response);
    }
}
