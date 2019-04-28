<?php

return [

    'models' => [
        /*
        |--------------------------------------------------------------------------
        | Model References
        |--------------------------------------------------------------------------
        |
        | Alcomponente needs to know which Eloquent Models should be referenced during
        | actions such as registering and checking for permissions, assigning
        | permissions to roles and users, and assigning roles to users.
        */

        'role' => Caffeinated\Alcomponente\Models\Role::class,
        'permission' => Caffeinated\Alcomponente\Models\Permission::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Use Migrations
    |--------------------------------------------------------------------------
    |
    | Alcomponente comes packaged with everything out of the box for you, including
    | migrations. If instead you wish to customize or extend Alcomponente beyond
    | its offering, you may disable the provided migrations for your own.
    */

    'migrate' => true,

];
