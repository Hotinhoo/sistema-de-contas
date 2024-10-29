<?php

namespace App\Providers;

use App\Models\Conta;
use App\Policies\ContaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Conta::class => ContaPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
