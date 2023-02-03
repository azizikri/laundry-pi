<?php

namespace App\Policies\Admin;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function isSuperAdmin(Admin $admin)
    {
        return $admin->is_super_admin;
    }

}
