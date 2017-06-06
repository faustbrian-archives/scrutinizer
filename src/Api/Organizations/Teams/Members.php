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

class Members extends AbstractApi
{
    public function all($organization, $team)
    {
        $response = $this->get("organizations/$organization/teams/$team/members");

        return [
            'meta' => array_except($response, '_embedded'),
            'results' => $this->getMapper()->raw($response['_embedded']['members']),
        ];
    }

    public function add($organization, $team, $email)
    {
        $response = $this->put("organizations/$organization/teams/$team/members", [
            'email' => $email,
        ]);

        return $this->getMapper()->raw($response);
    }

    public function remove($organization, $team, $user)
    {
        return $this->delete("organizations/$organization/teams/$team/members/$user");
    }
}
