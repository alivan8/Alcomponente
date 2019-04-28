<?php

namespace Caffeinated\Alcomponente\Tactics;

use Illuminate\Database\Eloquent\Model;
use Caffeinated\Alcomponente\Facades\Alcomponente;

class RevokePermissionsFrom
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

    public function to($roleOrUser)
    {
        if ($roleOrUser instanceof Model) {
            $instance = $roleOrUser;
        } else {
            $instance = Alcomponente::role()->where('slug', $roleOrUser)->firstOrFail();
        }

        $instance->revokePermissionTo($this->permissions);
    }
}