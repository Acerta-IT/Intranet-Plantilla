<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Enums\Privileges;
use App\Enums\Departments;
use Illuminate\Http\Request;
use App\Mail\UserSetPassword;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as PasswordRules;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'department' => ['required', Rule::enum(Departments::class)],
            'privileges' => ['required', Rule::enum(Privileges::class)],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['nullable', 'confirmed', PasswordRules::defaults()],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'surname.required' => 'El apellido es obligatorio.',
            'surname.string' => 'El apellido debe ser una cadena de texto.',
            'surname.max' => 'El apellido no puede tener más de 255 caracteres.',
            'department.required' => 'El departamento es obligatorio.',
            'department.enum' => 'El departamento seleccionado no es válido.',
            'privileges.required' => 'Los privilegios son obligatorios.',
            'privileges.enum' => 'Los privilegios seleccionados no son válidos.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.lowercase' => 'El correo electrónico debe estar en minúsculas.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'email.unique' => 'El correo electrónico ya está registrado.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'department' => $request->department,
            'privileges' => $request->privileges,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (!$request->password) {
            $token = Password::broker()->createToken($user);

            // Crear la URL para restablecer la contraseña
            $resetUrl = url("/reset-password/$token?email={$user->email}");

            // Enviar el correo
            Mail::to($user->email)->send(new UserSetPassword($resetUrl));
        }


        return redirect(route('user.index', absolute: false));
    }

    public function edit(){
        return view('user.edit');
    }
}
