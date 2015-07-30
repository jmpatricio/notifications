<?php
/**
 * Manager file
 *
 * @package     Jmpatricio\notifications
 * @file        Manager.php
 * @createdby   joao
 * @createdon   2015/07/29
 * @copyright   Copyright (c) UCADEMICS 2015, All rights reserved.
 * @since
 */


namespace Jmpatricio\Notifications;

use Jmpatricio\Notifications\Models\Action;
use Jmpatricio\Notifications\Providers\Configuration;
use Jmpatricio\Notifications\Providers\Email\EmailProvider;
use Jmpatricio\Notifications\Repositories\ActionRepository;
use Jmpatricio\Notifications\Repositories\TriggerRepository;
use Jmpatricio\Notifications\Models\Trigger;

/**
 * Class Manager
 * @since
 */
class Manager
{

    /**
     * @var \Jmpatricio\Notifications\Handler
     */
    protected $handler;

    /**
     * Construct the manager
     */
    public function __construct(){
        $this->handler = new Handler();
    }

    /**
     * Get the Trigger repository
     * @return TriggerRepository
     * @since 1.0
     */
    public function getTriggerRepository()
    {
        return new TriggerRepository();
    }


    /**
     * Get the action repository
     * @return ActionRepository
     * @since 1.0
     */
    public function getActionRepository(){
        return new ActionRepository();
    }

    /**
     * Fire the trigger and execute the configured actions
     * @param string|\Jmpatricio\Notifications\Models\Trigger $trigger Trigger to fire
     * @param mixed $data Data payload. Default null
     * @since 1.0
     */
    public function fire($trigger, $data = null)
    {
        if (!$trigger instanceof Trigger) {
            $trigger = $this->getTriggerRepository()->getBySlug($trigger);
        }

        if (!$trigger){
            return;
        }

        /** @var \Illuminate\Support\Collection $actions */
        $actions = $trigger->actions;

        /** @var \Jmpatricio\Notifications\Models\Action $action */
        $actions->each(function($action) use ($data){
            $this->executeAction($action, $data);
        });

        return;
    }

    /**
     * Execute an action
     * @param Action $action Action to be executed
     * @param mixed $payload
     * @since 1.0
     */
    protected function executeAction(Action $action, $payload=null){
        /** @var Configuration $configuration */
        $configuration = $action->configuration;

        // Choose the provider based on something
        $provider = new EmailProvider();

        $this->handler->execute($provider,$configuration,$payload);
    }
}
