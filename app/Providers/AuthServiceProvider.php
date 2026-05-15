<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        try {
            $permissions = Permission::all();

            foreach ($permissions as $permission) {
                Gate::define($permission->title, function ($user) use ($permission) {
                    return $user->roles()->whereHas('permissions', function ($query) use ($permission) {
                        $query->where('id', $permission->id);
                    })->exists();
                });
            }
        } catch (\Exception $e) {
            // Permission table might not exist yet
        }
    }

}
