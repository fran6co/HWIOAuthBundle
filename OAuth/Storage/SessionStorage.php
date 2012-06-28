<?php

namespace HWI\Bundle\OAuthBundle\OAuth\Storage;

use HWI\Bundle\OAuthBundle\OAuth\StorageInterface,
    HWI\Bundle\OAuthBundle\OAuth\ResourceOwnerInterface;

/**
 * Session storage for tokens
 *
 * @author Alexander <iam.asm89@gmail.com>
 * @author Francisco Facioni <fran6co@gmail.com>
 */
class SessionStorage implements StorageInterface
{
    private $session;

    /**
     * @param Session $session
     */
    public function __construct($session)
    {
        $this->session = $session;
    }

    /**
     * {@inheritDoc}
     */
    public function read(ResourceOwnerInterface $resourceOwner, $tokenId)
    {
        return $this->session->get($this->generateKey($resourceOwner, $tokenId));
    }

    /**
     * {@inheritDoc}
     */
    public function write(ResourceOwnerInterface $resourceOwner, $token)
    {
        $this->session->set($this->generateKey($resourceOwner, $token['oauth_token']), $token);
    }

    protected function generateKey(ResourceOwnerInterface $resourceOwner, $tokenId)
    {
        return implode('.', array(
            '_hwi_oauth.request_token',
            $resourceOwner->getName(),
            $resourceOwner->getOption('client_id'),
            $tokenId,
        ));
    }
}
