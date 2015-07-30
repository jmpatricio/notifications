<?php
/**
 * Trigger file
 *
 * @package     Jmpatricio\notifications\Models
 * @file        Trigger.php
 * @createdby   Joao Patricio
 * @createdon   2015/07/29
 * @since 1.0
 */


namespace Jmpatricio\Notifications\Models;

/**
 * Class Trigger Represents the event trigger
 * @since 1.0
 */
class Trigger extends AbstractModel
{

    protected $table = 'notification_triggers';

    protected $fillable = ['slug','description'];
    /**
     * Relation with actions to this trigger
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @since 1.0
     */
    public function actions()
    {
        return $this->hasMany('Jmpatricio\Notifications\Models\Action');
    }
}