<?php

namespace App\Policies;

use App\Models\Conta;
use App\Models\User;

class ContaPolicy
{
    // Determina se o usuário pode visualizar todas as bills (somente Admin).
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    // Determina se o usuário pode visualizar uma conta específica.
    public function view(User $user, Conta $conta): bool
    {
        return $user->id === $conta->user_id || $user->role === 'admin';
    }

    // Determina se o usuário pode criar uma conta.
    public function create(User $user): bool
    {
        return $user->role === 'user' || $user->role === 'admin';
    }

    // Determina se o usuário pode atualizar uma conta.
    public function update(User $user, Conta $conta): bool
    {
        return $user->id === $conta->user_id || $user->role === 'admin';
    }

    // Determina se o usuário pode excluir uma conta.
    public function delete(User $user, Conta $conta): bool
    {
        return $user->id === $conta->user_id || $user->role === 'admin';
    }

}
