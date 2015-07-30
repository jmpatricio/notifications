<?php
/**
 * Action file
 *
 * @package     Jmpatricio\notifications\Models
 * @file        Action.php
 * @createdby   Joao Patricio
 * @createdon   2015/07/29
 * @since 1.0
 */


namespace Jmpatricio\Notifications\Models;
use Jmpatricio\Notifications\Providers\Configuration;

/**
 * Class Action Represents the action to be taken
 * @since 1.0
 */
class Action extends AbstractModel
{
    protected $table = 'notification_actions';

    protected $fillable = ['trigger_id', 'type', 'configuration'];
    /**
     * Related trigger
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @since 1.0
     */
    public function trigger()
    {
        return $this->belongsTo('Jmpatricio\Notifications\Models\Trigger');
    }

    /**
     * @return Configuration
     * @since 1.0
     */
    public function getConfigurationAttribute(){
        return Configuration::createFromJson($this->attributes['configuration']);
    }

    /**
     * Set the configuration attribute
     * @param Configuration $configuration
     * @since 1.0
     */
    public function setConfigurationAttribute(Configuration $configuration)
    {
        $this->attributes['configuration'] = $configuration->toJson();
    }
}