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

class Repositories extends AbstractApi
{
    public function details($username, $repo, $type)
    {
        $requestUrls = [
            'github' => "repositories/g/$username/$repo",
            'bitbucket' => "repositories/b/$username/$repo",
            'plain' => "repositories/gp/$repo",
        ];

        $response = $this->get($requestUrls[$type]);

        return $this->getMapper()->raw($response);
    }

    public function addGithub($name, $parameters = [])
    {
        $response = $this->post('repositories/g', array_merge([
            'name' => $name,
        ], $parameters));

        return $this->getMapper()->raw($response);
    }

    public function addBitbucket($name, $parameters = [])
    {
        $response = $this->post('repositories/b', array_merge([
            'name' => $name,
        ], $parameters));

        return $this->getMapper()->raw($response);
    }

    public function addPlain($name, $gitUrl, $sshKey, $parameters = [])
    {
        $response = $this->post('repositories/gp', array_merge([
            'name' => $name,
            'git_url' => $gitUrl,
            'ssh_key' => $sshKey,
        ], $parameters));

        return $this->getMapper()->raw($response);
    }
}
