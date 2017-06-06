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

class Indices extends AbstractApi
{
    public function details($username, $repo, $idOrSourceReference, $type)
    {
        $requestUrls = [
            'github' => "repositories/g/$username/$repo/indices/$idOrSourceReference",
            'bitbucket' => "repositories/b/$username/$repo/indices/$idOrSourceReference",
            'plain' => "repositories/gp/$repo/indices/$idOrSourceReference",
        ];

        $response = $this->get($requestUrls[$type]);

        return $this->getMapper()->raw($response, $this->modelIndex);
    }

    public function issues($username, $repo, $idOrSourceReference, $type, $parameters = [])
    {
        $requestUrls = [
            'github' => "repositories/g/$username/$repo/indices/$idOrSourceReference/issues",
            'bitbucket' => "repositories/b/$username/$repo/indices/$idOrSourceReference/issues",
            'plain' => "repositories/gp/$repo/indices/$idOrSourceReference/issues",
        ];

        $response = $this->get($requestUrls[$type], $parameters);

        return [
            'meta' => array_except($response, '_embedded'),
            'results' => $this->getMapper()->raw(
                $response['_embedded']['issues'], $this->modelIssue
            ),
        ];
    }
}
