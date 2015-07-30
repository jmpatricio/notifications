<?php
/**
 * Configuration file
 *
 * @package     Jmpatricio\notifications\Providers
 * @file        Configuration.php
 * @createdby   joao
 * @createdon   2015/07/30
 *
 * @since
 */


namespace Jmpatricio\Notifications\Providers;
use Illuminate\Support\Collection;


/**
 * Class Configuration
 * @since
 */
class Configuration
{
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $attributes;

    /**
     * Configuration constructor.
     * @param \Illuminate\Support\Collection $attributes Collection of ConfigurationAttribute objects
     */
    public function __construct(\Illuminate\Support\Collection $attributes = null)
    {
        $this->attributes = (!$attributes)

            ? new Collection()

            : $attributes->filter(function ($attribute) {
                return $attribute instanceof ConfigurationAttribute;
            });

    }

    /**
     * Add a new attibute to the configuration
     * @param ConfigurationAttribute $attribute Attribtue to be added
     * @since 1.0
     */
    public function add(ConfigurationAttribute $attribute)
    {
        $this->attributes->push($attribute);
    }


    /**
     * Get the configuration attributes
     * @return Collection|static Collection of ConfigurationAttribute objects
     * @since 1.0
     */
    public function getAttributes(){
        return $this->attributes;
    }

    /**
     * Get an attribute by name
     * @param string $name Attribute name
     * @return ConfigurationAttribute|null
     * @since 1.0
     */
    public function getAttribute($name, $returnValue=true){
        $attribute = $this->attributes->filter(function($attr) use ($name){
            /** @var ConfigurationAttribute $attr */
            return $attr->getName() == $name;
        })->first();
        return ($returnValue && $attribute) ? $attribute->getValue() : $attribute;
    }

    /**
     * Check if the attribute exists in configuration
     * @param ConfigurationAttribute|string $attribute The attribute or the attribute name
     * @return bool
     * @since 1.0
     */
    public function exists($attribute){
        $name = $attribute;
        if ($attribute instanceof ConfigurationAttribute){
            $name = $attribute->getName();
        }

        return $this->getAttribute($name) != null;
    }


    /**
     * @return string
     * @since
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Get the array representation of attributes
     * @return array Assoc array with attribute name in the key
     * @since 1.0
     */
    public function toArray()
    {
        $returnArr = [];

        $this->attributes->each(function($attribute) use (&$returnArr){
            /* @var ConfigurationAttribute $attribute **/
            $returnArr[$attribute->getName()] = $attribute->getValue();
        });

        return $returnArr;
    }

    /**
     * @param string $json Json string
     * @return Configuration Configuration object
     * @since 1.0
     */
    public static function createFromJson($json){
        $arr = json_decode($json,true);

        $configuration = new Configuration();

        foreach ($arr as $configName => $configValue){
            $configuration->add(new ConfigurationAttribute($configName,$configValue));
        }

        return $configuration;
    }

    /**
     * Create a new configuration from an assoc array
     * @param array $array
     * @return Configuration
     * @since 1.0
     */
    public static function createFromArray(array $array){
        $configuration = new Configuration();
        foreach ($array as $name => $value){
            $configuration->add(new ConfigurationAttribute($name,$value));
        }
        return $configuration;
    }

}