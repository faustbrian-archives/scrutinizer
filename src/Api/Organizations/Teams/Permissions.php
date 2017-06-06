<?php

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Scrutinizer\Api\Organizations\Teams;

use BrianFaust\Unified\AbstractApi;

class Permissions extends AbstractApi
{
    public function all($organization, $team)
    {
        $response = $this->get("organizations/$organization/teams/$team/permissions");

        return $this->getMapper()->raw($response['_embedded']['permissions']);
    }

    public function add($organization, $team, $username, $repo, $access, $type)
    {
        $requestUrls = [
            'github' => "organizations/$organization/teams/$team/permissions/g/$username/$repo",
            'bitbucket' => "organizations/$organization/teams/$team/permissions/b/$username/$repo",
            'plain' => "organizations/$organization/teams/$team/permissions/gp/$repo",
        ];

        $response = $this->put($requestUrls[$type], $access);

        return $this->getMapper()->raw($response);
    }

    public function remove($slug, $team, $username, $repo, $type)
    {
        $requestUrls = [
            'github' => "organizations/$slug/teams/$team/permissions/g/$username/$repo",
            'bitbucket' => "organizations/$slug/teams/$team/permissions/b/$username/$repo",
            'plain' => "organizations/$slug/teams/$team/permissions/gp/$repo",
        ];

        return $this->delete($requestUrls[$type]);
    }
}
