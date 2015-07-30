<?php
/**
 * Handler file
 *
 * @package     Jmpatricio\notifications
 * @file        Handler.php
 * @createdby   joao
 * @createdon   2015/07/29
 *
 * @since
 */


namespace Jmpatricio\Notifications;
use Jmpatricio\Notifications\Contracts\ProviderInterface;
use Jmpatricio\Notifications\Exceptions\ConfigurationNotValidException;
use Jmpatricio\Notifications\Providers\Configuration;


/**
 * Class Handler
 * @since
 */
class Handler
{
    /**
     *
     * @param ProviderInterface $provider
     * @param Configuration $configuration
     * @param mixed $payload
     * @throws ConfigurationNotValidException If the configuration is not valid for the provider
     * @since 1.0
     */
    public function execute(ProviderInterface $provider, Configuration $configuration, $payload){
        $provider->setConfiguration($configuration);
        $provider->validateConfiguration();
        $provider->fire($payload);
        return;
    }
}