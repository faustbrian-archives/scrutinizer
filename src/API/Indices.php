<?php

declare(strict_types=1);

/*
 * This file is part of Scrutinizer PHP Client.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plients\Scrutinizer\API;

use Plients\Http\HttpResponse;

class Indices extends AbstractAPI
{
    /**
     * @param string $username
     * @param string $repo
     * @param string $idOrSourceReference
     * @param string $type
     *
     * @return \Plients\Http\HttpResponse
     */
    public function details(string $username, string $repo, string $idOrSourceReference, string $type): HttpResponse
    {
        return $this->client->get([
            'github'    => "repositories/g/{$username}/{$repo}/indices/{$idOrSourceReference}",
            'bitbucket' => "repositories/b/{$username}/{$repo}/indices/{$idOrSourceReference}",
            'plain'     => "repositories/gp/{$repo}/indices/{$idOrSourceReference}",
        ][$type]);
    }

    /**
     * @param string $username
     * @param string $repo
     * @param string $idOrSourceReference
     * @param string $type
     * @param array  $parameters
     *
     * @return \Plients\Http\HttpResponse
     */
    public function issues(string $username, string $repo, string $idOrSourceReference, string $type, array $parameters = []): HttpResponse
    {
        return $this->client->get([
            'github'    => "repositories/g/{$username}/{$repo}/indices/{$idOrSourceReference}/issues",
            'bitbucket' => "repositories/b/{$username}/{$repo}/indices/{$idOrSourceReference}/issues",
            'plain'     => "repositories/gp/{$repo}/indices/{$idOrSourceReference}/issues",
        ][$type], $parameters);
    }
}
