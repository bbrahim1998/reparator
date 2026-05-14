<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $usuarios = User::where('rol', 'administrador')->orderBy('id')->paginate(15);

        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create(): View
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'administrador',
        ]);

        return redirect()->route('admin.usuarios')->with('status', 'Administrador creado correctamente.');
    }

    public function edit(User $user): View|RedirectResponse
    {
        if ($user->rol !== 'administrador') {
            return redirect()->route('admin.usuarios')->with('error', 'El usuario no es administrador.');
        }

        return view('admin.usuarios.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        if ($user->rol !== 'administrador') {
            return redirect()->route('admin.usuarios')->with('error', 'El usuario no es administrador.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.usuarios')->with('status', 'Administrador actualizado correctamente.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->rol !== 'administrador') {
            return redirect()->route('admin.usuarios')->with('error', 'El usuario no es administrador.');
        }

        if ($user->id === auth()->id()) {
            return redirect()->route('admin.usuarios')->with('error', 'No puedes eliminarte a ti mismo.');
        }

        $user->delete();

        return redirect()->route('admin.usuarios')->with('status', 'Administrador eliminado correctamente.');
    }
}
