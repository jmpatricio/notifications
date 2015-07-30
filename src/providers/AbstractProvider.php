<?php
/**
 * AbstractProvider file
 *
 * @package     Jmpatricio\notifications\Providers
 * @file        AbstractProvider.php
 * @createdby   joao
 * @createdon   2015/07/29
 *
 * @since
 */


namespace Jmpatricio\Notifications\Providers;

use Jmpatricio\Notifications\Contracts\ProviderInterface;
use Jmpatricio\Notifications\Exceptions\ConfigurationNotValidException;

/**
 * Class AbstractProvider
 * @since
 */
abstract class AbstractProvider implements ProviderInterface
{

    /**
     * Check if the configurtion is valid
     * @return bool True if is valid
     * @throws ConfigurationNotValidException If the configuration is not valid
     * @since 1.0
     */
    public function validateConfiguration()
    {
        return true;
    }


    /**
     * Validate the configuration, using laravel validator
     * @param array $rules Rules array
     * @return bool True if valid
     * @throws ConfigurationNotValidException If not valid
     * @since 1.0
     */
    protected function validateConfigurationByRules(array $rules)
    {
        $data = $this->getConfiguration()->toArray();

        /** @var \Illuminate\Validation\Validator $validator */
        $validator = \Validator::make($data,$rules);

        if ($validator->fails()){
            $exception = new \Jmpatricio\Notifications\Exceptions\ConfigurationNotValidException('Configuration not valid');
            $exception->setErrors($validator->messages()->toArray());
            throw $exception;
        }
        return true;
    }

}