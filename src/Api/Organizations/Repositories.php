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
use BrianFaust\Scrutinizer\Models\Repository;

class Repositories extends AbstractApi
{
    public function all($organization, $parameters = [])
    {
        $response = $this->get("organizations/$organization/repositories", $parameters);

        return [
            'meta' => array_except($response, '_embedded'),
            'results' => $this->getMapper()->raw($response['_embedded']['repositories']),
        ];
    }

    public function add($organization, $repository)
    {
        $response = $this->put("organizations/$organization/repositories", [
            'repository' => $repository,
        ]);

        return $this->getMapper()->raw($response);
    }

    public function remove($organization, $username, $repo, $type)
    {
        $requestUrls = [
            'github' => "organizations/$organization/repositories/g/$username/$repo",
            'bitbucket' => "organizations/$organization/repositories/b/$username/$repo",
            'plain' => "organizations/$organization/repositories/gp/$repo",
        ];

        return $this->delete($requestUrls[$type]);
    }
}
