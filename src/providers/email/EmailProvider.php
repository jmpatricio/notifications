<?php
/**
 * EmailProvider file
 *
 * @package     Jmpatricio\notifications\Providers\Email
 * @file        EmailProvider.php
 * @createdby   joao
 * @createdon   2015/07/29
 *
 * @since
 */


namespace Jmpatricio\Notifications\Providers\Email;

use Jmpatricio\Notifications\Exceptions\ConfigurationNotValidException;
use Jmpatricio\Notifications\Providers\AbstractProvider;
use Jmpatricio\Notifications\Providers\Configuration;

/**
 * Class EmailProvider
 * @since
 */
class EmailProvider extends AbstractProvider
{

    protected $name = "email";

    /**
     * @var Configuration
     */
    protected $configuration;

    /**
     * EmailProvider constructor.
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration = null)
    {
        $this->configuration = (!$configuration) ? new Configuration() : $configuration;
    }

    /**
     * Get the provider name
     * @return string The provider name
     * @since 1.0
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Configuration The provider configuration
     * @since 1.0
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param Configuration $configuration
     * @since 1.0
     */
    public function setConfiguration(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Check if the configurtion is valid
     * @return bool True if is valid
     * @throws ConfigurationNotValidException If the configuration is not valid
     * @since 1.0
     */
    public function validateConfiguration()
    {
        return $this->validateConfigurationByRules([
            'view' => 'required',
            'fromEmail' => 'required:email',
            'fromName'  => 'sometimes|required',
            'toEmail'   => 'required|email',
            'toName'    => 'sometimes|required',
            'subject'   => 'required'
        ]);
    }


    /**
     * Execute the event
     * @param mixed $payLoad
     * @since
     * @return bool|void
     */
    public function fire($payLoad)
    {
        $config = $this->getConfiguration();

        $payLoad = (!$payLoad) ? [] : ['data' => $payLoad];

        $view = $config->getAttribute('view');

        $result = \Mail::send($view, $payLoad, function ($message) use ($config) {
            $message->from($config->getAttribute('fromEmail'), $config->getAttribute('fromName'));
            $message->to($config->getAttribute('toEmail'), $config->getAttribute('toName'));
        });

        sleep(1);
        return;
    }


}