<?php
/**
 * TriggerRepository file
 *
 * @package     Jmpatricio\Notifications\Repositories
 * @file        TriggerRepository.php
 * @createdby   joao
 * @createdon   2015/07/29
 * @copyright   Copyright (c) UCADEMICS 2015, All rights reserved.
 * @since
 */


namespace Jmpatricio\Notifications\Repositories;

use Jmpatricio\Notifications\Models\Action;
use Jmpatricio\Notifications\Models\Trigger;
use Jmpatricio\Notifications\Exceptions\NotCreatedException;

/**
 * Class TriggerRepository
 * @since
 */
class TriggerRepository extends AbstractRepository
{

    /**
     * Create a new trigger
     * @param string $slug Slug
     * @param string $description Trigger description
     * @return \Jmpatricio\Notifications\Models\Trigger New created trigger
     * @throws NotCreatedException If cannot be created
     * @since 1.0
     */
    public function add($slug, $description = '')
    {
        try {
            $trigger = Trigger::create([
                'slug' => $slug,
                'description' => $description
            ]);
            return $trigger;
        } catch (\Exception $e) {
            throw new NotCreatedException('Trigger not created', 0, $e);
        }
    }

    /**
     * @param string $slug Trigger slug
     * @return null|\Jmpatricio\Notifications\Models\Trigger
     * @since 1.0
     */
    public function getBySlug($slug)
    {
        return Trigger::whereSlug($slug)->get()->first();
    }
}