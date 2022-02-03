<?php

namespace ewald1976\FilamentSpatieRolesPermissions\Resources;

use ewald1976\FilamentSpatieRolesPermissions\Resources\RoleResource\Pages\CreateRole;
use ewald1976\FilamentSpatieRolesPermissions\Resources\RoleResource\Pages\EditRole;
use ewald1976\FilamentSpatieRolesPermissions\Resources\RoleResource\Pages\ListRoles;
use ewald1976\FilamentSpatieRolesPermissions\Resources\RoleResource\Pages\ViewRole;
use ewald1976\FilamentSpatieRolesPermissions\Resources\RoleResource\RelationManager\PermissionRelationManager;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\BelongsToManyCheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Spatie\Permission\Models\Role;

class RoleResource extends Resource
{

    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getLabel(): string
    {
        return __('filament-spatie-roles-permissions::filament-spatie.section.role');
    }
    
    protected static function getNavigationGroup(): ?string
    {
        return __('filament-spatie-roles-permissions::filament-spatie.section.roles_and_permissions');
    }

    public static function getPluralLabel(): string
    {
        return __('filament-spatie-roles-permissions::filament-spatie.section.roles');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.name')),
                    Select::make('guard_name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.guard_name'))->options([
                        'web' => 'Web',
                    ])->default('web')
                    ->disablePlaceholderSelection(),
                    BelongsToManyCheckboxList::make('permissions')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.permissions'))
                    ->relationship('permissions', 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.name'))
                    ->searchable(),
                TextColumn::make('guard_name')
                    ->label(__('filament-spatie-roles-permissions::filament-spatie.field.guard_name'))
                    ->searchable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PermissionRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'edit'   => EditRole::route('/{record}/edit'),
            'view'   => ViewRole::route('/{record}')
        ];
    }
}
