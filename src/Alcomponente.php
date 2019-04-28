<?php

namespace Caffeinated\Alcomponente;

use Caffeinated\Alcomponente\Tactics\AssignRoleTo;
use Caffeinated\Alcomponente\Tactics\GivePermissionTo;
use Caffeinated\Alcomponente\Tactics\RevokePermissionFrom;

class Alcomponente
{
    /**
     * Fetch an instance of the Role model.
     * 
     * @return Role
     */
    public function role()
    {
        return app()->make(config('alcomponente.models.role'));
    }

    /**
     * Fetch an instance of the Permission model.
     * 
     * @return Permission
     */
    public function permission()
    {
        return app()->make(config('alcomponente.models.permission'));
    }

    /**
     * Assign roles to a user.
     * 
     * @param  string|array  $roles
     * @return \Caffeinated\Alcomponente\Tactic\AssignRoleTo
     */
    public function assign($roles): AssignRoleTo
    {
        return new AssignRoleTo($roles);
    }
    
    /**
     * Give permissions to a user or role
     * 
     * @param  string|array  $permissions
     * @return \Caffeinated\Alcomponente\Tactic\GivePermissionTo
     */
    public function give($permissions): GivePermissionTo
    {
        return new GivePermissionTo($permissions);
    }
    
    /**
     * Revoke permissions from a user or role
     * 
     * @param  string|array  $permissions
     * @return \Caffeinated\Alcomponente\Tactic\RevokePermissionFrom
     */
    public function revoke($permissions): RevokePermissionFrom
    {
        return new RevokePermissionFrom($permissions);
    }
}
