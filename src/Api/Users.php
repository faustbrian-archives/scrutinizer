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

class Users extends AbstractApi
{
    public function repositories($parameters = [])
    {
        $response = $this->get('user/repositories', $parameters);

        return [
            'meta' => array_except($response, '_embedded'),
            'results' => $this->getMapper()->raw(
                $response['_embedded']['repositories'], $this->modelRepository
            ),
        ];
    }

    public function configs()
    {
        $response = $this->get('user/configs');

        return [
            'meta' => array_except($response, '_embedded'),
            'results' => $this->getMapper()->raw(
                $response['_embedded']['configs'], $this->modelConfig
            ),
        ];
    }
}
