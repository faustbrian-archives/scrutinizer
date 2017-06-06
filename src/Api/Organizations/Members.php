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

class Members extends AbstractApi
{
    public function all($organization)
    {
        $response = $this->get("organizations/$organization/members");

        return [
            'meta' => array_except($response, '_embedded'),
            'results' => $this->getMapper()->raw($response['_embedded']['members']),
        ];
    }

    public function add($organization, $email, $role)
    {
        $response = $this->put("organizations/$organization/members", [
            'email' => $email,
            'role' => $role,
        ]);

        return $this->getMapper()->raw($response);
    }

    public function remove($organization, $user)
    {
        return $this->delete("organizations/$organization/members/$user");
    }
}
