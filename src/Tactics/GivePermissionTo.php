<?php

namespace Caffeinated\Alcomponente\Tactics;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Alcomponente\Facades\Alcomponente;

class GivePermissionTo
{
    /**
     * @var array
     */
    protected $permissions;

    /**
     * Create a new GivePermissionTo instance.
     * 
     * @param  array  $permissions
     */
    public function __construct(...$permissions)
    {
        $this->permissions = array_flatten($permissions);
    }

    /**
     * Give the permissions to the given user or role.
     * 
     * @param  Role|User  $roleOrUser
     */
    public function to($roleOrUser)
    {
        if ($roleOrUser instanceof Model) {
            $instance = $roleOrUser;
        } else {
            $instance = Alcomponente::role()->where('slug', $roleOrUser)->firstOrFail();
        }

        $instance->givePermissionTo($this->permissions);
    }
}