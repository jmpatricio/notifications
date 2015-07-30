<?php
/**
 * ActionRepository file
 *
 * @package     Jmpatricio\Notifications\Repositories
 * @file        ActionRepository.php
 * @createdby   joao
 * @createdon   2015/07/29
 * @copyright   Copyright (c) UCADEMICS 2015, All rights reserved.
 * @since
 */


namespace Jmpatricio\Notifications\Repositories;

use Jmpatricio\Notifications\Exceptions\NotCreatedException;
use Jmpatricio\Notifications\Models\Action;
use Jmpatricio\Notifications\Models\Trigger;


/**
 * Class ActionRepository
 * @since
 */
class ActionRepository extends AbstractRepository
{


    public function add(Trigger $trigger, $type, $configuration = [])
    {
        try {
            return Action::create([
                'trigger_id' => $trigger->id,
                'type' => $type,
                'configuration' => json_encode($configuration)
            ]);
        } catch (\Exception $e){
            throw new NotCreatedException('Action not created', 0, $e);
        }
    }

}