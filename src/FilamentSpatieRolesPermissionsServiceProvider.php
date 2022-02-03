<?php

namespace ewald1976\FilamentSpatieRolesPermissions;

use ewald1976\FilamentSpatieRolesPermissions\Resources\PermissionResource;
use ewald1976\FilamentSpatieRolesPermissions\Resources\RoleResource;
use Filament\PluginServiceProvider;
use Illuminate\Support\ServiceProvider;

class FilamentSpatieRolesPermissionsServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-spatie-roles-permissions';

    protected function getResources() :array {
        return [
            RoleResource::class,
            PermissionResource::class
        ];
    }
}