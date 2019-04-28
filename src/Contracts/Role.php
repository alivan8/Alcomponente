<?php

namespace Caffe\Alcomponente\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface Role
{
    /**
     * Roles can belong to many users.
     *
     * @return Model
     */
    public function users(): BelongsToMany;
}