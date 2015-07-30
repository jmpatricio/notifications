<?php
/**
 * Action file
 *
 * @package     Jmpatricio\Notifications\Models
 * @file        Action.php
 * @createdby   Joao Patricio
 * @createdon   2015/07/29
 * @since 1.0
 */


namespace Jmpatricio\Notifications\Models;

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

    public function getConfigurationAttribute(){
        return json_decode($this->attributes['configuration']);
    }
}