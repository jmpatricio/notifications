<?php
/**
 * Handler file
 *
 * @package     Jmpatricio\Notifications
 * @file        Handler.php
 * @createdby   joao
 * @createdon   2015/07/29
 * @copyright   Copyright (c) UCADEMICS 2015, All rights reserved.
 * @since
 */


namespace Jmpatricio\Notifications;
use Jmpatricio\Notifications\Contracts\ProviderInterface;


/**
 * Class Handler
 * @since
 */
class Handler
{
    /**
     *
     * @param ProviderInterface $provider
     * @param array $configuration
     * @param mixed $payload
     * @since 1.0
     */
    public function execute(ProviderInterface $provider, $configuration, $payload){
        $provider->setConfiguration($configuration);
        $provider->fire($payload);
        return;
    }
}