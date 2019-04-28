<?php

namespace Caffe\Alcomponente;

use Caffe\Alcomponente\Tactics\AssignRoleTo;
use Caffe\Alcomponente\Tactics\GivePermissionTo;
use Caffe\Alcomponente\Tactics\RevokePermissionFrom;

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
     * @return \Caffe\Alcomponente\Tactic\AssignRoleTo
     */
    public function assign($roles): AssignRoleTo
    {
        return new AssignRoleTo($roles);
    }
    
    /**
     * Give permissions to a user or role
     * 
     * @param  string|array  $permissions
     * @return \Caffe\Alcomponente\Tactic\GivePermissionTo
     */
    public function give($permissions): GivePermissionTo
    {
        return new GivePermissionTo($permissions);
    }
    
    /**
     * Revoke permissions from a user or role
     * 
     * @param  string|array  $permissions
     * @return \Caffe\Alcomponente\Tactic\RevokePermissionFrom
     */
    public function revoke($permissions): RevokePermissionFrom
    {
        return new RevokePermissionFrom($permissions);
    }
}
