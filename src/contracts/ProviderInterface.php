<?php
/**
 * NotificationProvider file
 *
 * @package     Jmpatricio\notifications\Contracts
 * @file        ProviderInterface.php
 * @createdby   joao
 * @createdon   2015/07/29
 *
 * @since
 */


namespace Jmpatricio\Notifications\Contracts;


use Jmpatricio\Notifications\Exceptions\ConfigurationNotValidException;
use Jmpatricio\Notifications\Providers\Configuration;

interface ProviderInterface
{

    /**
     * Get the provider name
     * @return string
     * @since 1.0
     */
    public function getName();

    /**
     * Get the current configuration
     * @return Configuration The configuration
     * @since 1.0
     */
    public function getConfiguration();

    /**
     * Set the configuration
     * @param Configuration $configuration
     * @since 1.0
     */
    public function setConfiguration(Configuration $configuration);

    /**
     * Fire the action
     * @param mixed $payLoad
     * @return bool True if was executed, False otherwise
     * @since 1.0
     */
    public function fire($payLoad);

    /**
     * Check if the configurtion is valid
     * @return bool True if is valid
     * @throws ConfigurationNotValidException If the configuration is not valid
     * @since 1.0
     */
    public function validateConfiguration();

}