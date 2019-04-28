<?php

namespace Caffeinated\Alcomponente\Tactics;

class AssignRoleTo
{
    /**
     * @var array
     */
    protected $roles;

    /**
     * Create a new AssignRoleTo instance.
     * 
     * @param  array  $roles
     */
    public function __construct(...$roles)
    {
        $this->roles = array_flatten($roles);
    }

    public function to($user)
    {
        $user->assignRoles($this->roles);
    }
}