<?php

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Scrutinizer\API;

use BrianFaust\Http\HttpResponse;
use BrianFaust\Http\HttpResponse;

class Repositories extends AbstractAPI
{
    /**
     * @param string $username
     * @param string $repo
     * @param string $type
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function details(string $username, string $repo, string $type): HttpResponse
    {
        return $this->client->get([
            'github'    => "repositories/g/{$username}/{$repo}",
            'bitbucket' => "repositories/b/{$username}/{$repo}",
            'plain'     => "repositories/gp/{$repo}",
        ][$type]);
    }

    /**
     * @param string $name
     * @param array  $parameters
     */
    public function addGithub(string $name, array $parameters = []): HttpResponse
    {
        return $this->client->post('repositories/g', compact('name') + $parameters);
    }

    /**
     * @param string $name
     * @param array  $parameters
     */
    public function addBitbucket(string $name, array $parameters = []): HttpResponse
    {
        return $this->client->post('repositories/b', compact('name') + $parameters);
    }

    /**
     * @param string $name
     * @param string $git_url
     * @param string $ssh_key
     * @param array  $parameters
     */
    public function addPlain(string $name, string $git_url, string $ssh_key, array $parameters = []): HttpResponse
    {
        return $this->client->post('repositories/gp', compact('name', 'git_url', 'ssh_key') + $parameters);
    }
}
