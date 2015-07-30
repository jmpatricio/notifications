<?php
/**
 * ConfigurationAttribute file
 *
 * @package     Jmpatricio\notifications\Providers
 * @file        ConfigurationAttribute.php
 * @createdby   joao
 * @createdon   2015/07/30
 * @copyright   Copyright (c) UCADEMICS 2015, All rights reserved.
 * @since
 */


namespace Jmpatricio\Notifications\Providers;


/**
 * Class ConfigurationAttribute
 * @since
 */
class ConfigurationAttribute
{

    protected $name;

    protected $value;

    /**
     * ConfigurationAttribute constructor.
     * @param $name
     * @param null|mixed $value
     */
    public function __construct($name, $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get the string
     * @return string
     * @since 1.0
     */
    public function __toString()
    {
        return $this->getValue();
    }
}