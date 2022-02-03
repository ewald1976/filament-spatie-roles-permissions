<?php

namespace ewald1976\FilamentSpatieRolesPermissions;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ewald1976\FilamentSpatieRolesPermissions\Skeleton\SkeletonClass
 */
class FilamentSpatieRolesPermissionsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'filament-spatie-roles-permissions';
    }
}
