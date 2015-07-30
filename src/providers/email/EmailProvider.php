<?php
/**
 * EmailProvider file
 *
 * @package     Jmpatricio\Notifications\Providers\Email
 * @file        EmailProvider.php
 * @createdby   joao
 * @createdon   2015/07/29
 * @copyright   Copyright (c) UCADEMICS 2015, All rights reserved.
 * @since
 */


namespace Jmpatricio\Notifications\Providers\Email;

use Jmpatricio\Notifications\Providers\AbstractProvider;

/**
 * Class EmailProvider
 * @since
 */
class EmailProvider extends  AbstractProvider
{

    protected $configuration;

    public function getName()
    {
        // TODO: Implement getName() method.
    }

    public function getConfigurationSkeleton()
    {
        // TODO: Implement getConfigurationSkeleton() method.
    }

    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param array $configuration
     * @since
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;
    }

    public function fire($payLoad)
    {
        $configuration = $this->getConfiguration();

        $payLoad = (!$payLoad) ? [] : ['data' => $payLoad];

        $view = $configuration->view;

        $result = \Mail::send($view, $payLoad, function($message) use ($configuration)
        {
            $message->from('joao@ucademics.com', 'Ucademics Mail');
            $message->to('jmpatricio@gmail.com');
        });

        sleep(1);
        return;
    }


}