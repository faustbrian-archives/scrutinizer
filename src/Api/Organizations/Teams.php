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

class Teams extends AbstractApi
{
    public function all($organization)
    {
        $response = $this->get("organizations/$organization/teams");

        return [
            'meta' => array_except($response, '_embedded'),
            'results' => $this->getMapper()->raw($response['_embedded']['teams']),
        ];
    }

    public function add($organization, $name)
    {
        $response = $this->post("organizations/$organization/teams", [
            'name' => $name,
        ]);

        return $this->getMapper()->raw($response);
    }

    public function remove($organization, $teamUuid)
    {
        return $this->delete("organizations/$organization/teams/$teamUuid");
    }
}
