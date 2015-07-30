<?php
/**
 * NotificationProvider file
 *
 * @package     Jmpatricio\Notifications\Contracts
 * @file        ProviderInterface.php
 * @createdby   joao
 * @createdon   2015/07/29
 * @copyright   Copyright (c) UCADEMICS 2015, All rights reserved.
 * @since
 */


namespace Jmpatricio\Notifications\Contracts;


interface ProviderInterface
{

    /**
     * Get the provider name
     * @return string
     * @since 1.0
     */
    public function getName();

    /**
     * Get the configuration skeleton
     * @return mixed
     * @since 1.0
     */
    public function getConfigurationSkeleton();

    /**
     * Get the current configuration
     * @return mixed
     * @since 1.0
     */
    public function getConfiguration();

    /**
     * Set the configuration
     * @param mixed $configuration
     * @since 1.0
     */
    public function setConfiguration($configuration);

    /**
     * Fire the action
     * @param mixed $payLoad
     * @return bool True if was executed, False otherwise
     * @since 1.0
     */
    public function fire($payLoad);

}