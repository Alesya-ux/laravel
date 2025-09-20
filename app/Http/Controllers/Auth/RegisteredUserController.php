<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Base validation rules
        $rules = [
            'client_type' => ['required', 'in:individual,legal'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        // Add conditional validation based on client type
        if ($request->client_type === 'individual') {
            $rules['individual_name'] = ['required', 'string', 'max:255'];
            $rules['individual_phone'] = ['required', 'string', 'regex:/^\(?(\d{2})\)?\s?(\d{3})-?(\d{2})-?(\d{2})$/', 'max:20'];
        } elseif ($request->client_type === 'legal') {
            $rules['legal_unp'] = ['required', 'string', 'regex:/^\d{9}$/', 'max:20'];
            $rules['legal_name'] = ['required', 'string', 'max:255'];
            $rules['legal_phone'] = ['required', 'string', 'regex:/^\(?(\d{2})\)?\s?(\d{3})-?(\d{2})-?(\d{2})$/', 'max:20'];
        }

        $messages = [
            'individual_name.required' => 'Имя обязательно для заполнения.',
            'individual_phone.required' => 'Номер телефона обязателен для заполнения.',
            'individual_phone.regex' => 'Номер телефона должен быть в формате (29) 123-45-67 или 29 123-45-67.',
            'legal_unp.required' => 'УНП обязательно для заполнения.',
            'legal_unp.regex' => 'УНП должен содержать ровно 9 цифр.',
            'legal_name.required' => 'Название организации обязательно для заполнения.',
            'legal_phone.required' => 'Номер телефона обязателен для заполнения.',
            'legal_phone.regex' => 'Номер телефона должен быть в формате (29) 123-45-67 или 29 123-45-67.',
            'email.required' => 'Email обязателен для заполнения.',
            'email.email' => 'Email должен быть в правильном формате.',
            'email.unique' => 'Этот email уже зарегистрирован.',
            'password.required' => 'Пароль обязателен для заполнения.',
            'password.confirmed' => 'Пароли не совпадают.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
        ];

        $request->validate($rules, $messages);

        // Prepare user data based on client type
        $userData = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'client_type' => $request->client_type,
        ];

        if ($request->client_type === 'individual') {
            $userData['name'] = $request->individual_name;
            $userData['phone'] = $request->individual_phone;
        } elseif ($request->client_type === 'legal') {
            $userData['name'] = $request->legal_name;
            $userData['company_name'] = $request->legal_name;
            $userData['unp'] = $request->legal_unp;
            $userData['phone'] = $request->legal_phone;
        }

        $user = User::create($userData);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('register')->with('success', 'Регистрация прошла успешно! Добро пожаловать!');
    }
}
