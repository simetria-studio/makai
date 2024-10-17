<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        // return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $user = User::with('roles')->find($user->id);
        $roles = Role::where('user_id', $user->id)->get();
        $permissions = [
            'admin' => 'Admin',
            'vendor' => 'Vendedor',
            'consultor' => 'Consultor',
        ];

        $userRole = $user->roles->pluck('name')->first();
        return view('users.edit', get_defined_vars());
    }

    public function update(Request $request, User $user)
    {
        // Atualizar as informações básicas do usuário
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Se uma nova senha foi fornecida, atualiza a senha
        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        // Atualizando ou criando a role associada ao usuário
        $role = Role::updateOrCreate(
            ['user_id' => $user->id], // Condição de busca para verificar se já existe uma role
            ['name' => $request->permission, 'level' => 1] // Dados a serem atualizados ou criados
        );

        return response()->json(['success' => 'Usuário atualizado com sucesso!']);
    }


    public function destroy(Request $request, User $user)
    {

        $user->delete();
        return response()->json(['success' => 'Usuário deletado com sucesso!']);
    }

    public function create()
    {
        $permissions = [
            'admin' => 'Admin',
            'vendor' => 'Vendedor',
            'consultor' => 'Consultor',
        ];
        return view('users.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);



        $permission = Role::create([
            'name' => $request->permission,
            'user_id' => $user->id,
            'level' => 1,
        ]);

        return response()->json(['success' => 'Usuário criado com sucesso!']);
    }

    public function permissions()
    {
        $permissions = Role::all();
        return view('users.permissions', get_defined_vars());
    }
}
