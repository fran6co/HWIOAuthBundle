<?php

namespace HWI\Bundle\OAuthBundle\OAuth;

/**
 * Interface for classes providing a request tokens storage.
 *
 * The storage is needed because the oauth1.0a authentication flow requires
 * requests to be signed with the same values in consecutive requests.
 *
 * @author Alexander <iam.asm89@gmail.com>
 * @author Francisco Facioni <fran6co@gmail.com>
 */
interface OAuth1RequestTokenStorageInterface
{
    /**
     * Fetch a request token from the storage.
     *
     * @param ResourceOwnerInterface $resourceOwner
     * @param string                 $tokenId
     *
     * @return array
     */
    function fetch(ResourceOwnerInterface $resourceOwner, $tokenId);

    /**
     * Save a request token to the storage.
     *
     * @param ResourceOwnerInterface $resourceOwner
     * @param array                  $token
     */
    function save(ResourceOwnerInterface $resourceOwner, $token);
}