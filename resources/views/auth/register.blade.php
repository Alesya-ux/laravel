<x-guest-layout>

    <!-- Success Message -->
    @if (session('success'))
        <div id="success-message" class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

     <!-- Client Type Selection -->
        <div class="mb-6">
            <x-input-label for="client_type" :value="__('Тип клиента')" />
            <div class="mt-2 flex space-x-4">
                <label class="flex items-center">
                    <input type="radio" name="client_type" value="individual" id="individual" 
                           class="form-radio h-4 w-4 text-cyan-600 transition duration-150 ease-in-out" 
                           {{ old('client_type') == 'individual' ? 'checked' : '' }} required>
                    <span class="ml-2 text-sm text-gray-700">Физическое лицо</span>
                </label>
                <label class="flex items-center">
                    <input type="radio" name="client_type" value="legal" id="legal" 
                           class="form-radio h-4 w-4 text-cyan-600 transition duration-150 ease-in-out" 
                           {{ old('client_type') == 'legal' ? 'checked' : '' }} required>
                    <span class="ml-2 text-sm text-gray-700">Юридическое лицо</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('client_type')" class="mt-2" />
            
            <!-- Continue Button (always visible) -->
            <div id="continue-button" class="mt-4">
                <button type="button" id="continue-btn" class="w-full btn ml-2 bg-cyan-700 hover:bg-cyan-600 text-white px-4 py-2 rounded-md transition duration-150 ease-in-out" disabled>
                    {{ __('Продолжить') }}
                </button>
            </div>
        </div>

        <!-- Registration Form Container (hidden initially) -->
        <div id="registration-form" style="display: none;">
            <!-- Individual Client Form -->
            <div id="individual-form" class="client-form" style="display: none;">
                <!-- Name -->
                <div>
                    <x-input-label for="individual_name" :value="__('Имя')" />
                    <x-text-input id="individual_name" class="block mt-1 w-full" type="text" name="individual_name" :value="old('individual_name')" autocomplete="name" />
                    <x-input-error :messages="$errors->get('individual_name')" class="mt-2" />
                </div>

                <!-- Phone -->
                <div class="mt-4">
                    <x-input-label for="individual_phone" :value="__('Номер телефона')" />
                    <x-text-input id="individual_phone" class="block mt-1 w-full" type="tel" name="individual_phone" :value="old('individual_phone')" autocomplete="tel" placeholder="(29) 123-45-67" />
                    <x-input-error :messages="$errors->get('individual_phone')" class="mt-2" />
                </div>
            </div>

            <!-- Legal Entity Form -->
            <div id="legal-form" class="client-form" style="display: none;">
                <!-- UNP -->
                <div>
                    <x-input-label for="legal_unp" :value="__('УНП')" />
                    <x-text-input id="legal_unp" class="block mt-1 w-full" type="text" name="legal_unp" :value="old('legal_unp')" autocomplete="organization" placeholder="123456789" />
                    <p class="mt-1 text-sm text-gray-500">9 цифр без пробелов и дефисов</p>
                    <x-input-error :messages="$errors->get('legal_unp')" class="mt-2" />
                </div>

                <!-- Company Name -->
                <div class="mt-4">
                    <x-input-label for="legal_name" :value="__('Название организации')" />
                    <x-text-input id="legal_name" class="block mt-1 w-full" type="text" name="legal_name" :value="old('legal_name')" autocomplete="organization" placeholder="ООО 'Название компании'" />
                    <x-input-error :messages="$errors->get('legal_name')" class="mt-2" />
                </div>

                <!-- Phone -->
                <div class="mt-4">
                    <x-input-label for="legal_phone" :value="__('Номер телефона')" />
                    <x-text-input id="legal_phone" class="block mt-1 w-full" type="tel" name="legal_phone" :value="old('legal_phone')" autocomplete="tel" placeholder="(29) 123-45-67" />
                    <x-input-error :messages="$errors->get('legal_phone')" class="mt-2" />
                </div>
            </div>

            <!-- Email Address (for both types) -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="example@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Пароль')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" 
                                placeholder="Минимум 8 символов" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Подтвердить пароль')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" 
                                placeholder="Повторите пароль" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <button type="button" id="back-btn" class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                    ← {{ __('Назад к выбору типа клиента') }}
                </button>
                
                <div class="flex items-center space-x-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500" href="{{ route('login') }}">
                        {{ __('Уже зарегистрированы?') }}
                    </a>

                    <button type="submit" class="btn ml-2 bg-cyan-700 hover:bg-cyan-600 text-white px-4 py-2 rounded-md transition duration-150 ease-in-out">
                        {{ __('Регистрация') }}
                    </button>
                </div>
            </div>
        </div>
    </form>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const individualRadio = document.getElementById('individual');
            const legalRadio = document.getElementById('legal');
            const continueButton = document.getElementById('continue-button');
            const continueBtn = document.getElementById('continue-btn');
            const backBtn = document.getElementById('back-btn');
            const registrationForm = document.getElementById('registration-form');
            const individualForm = document.getElementById('individual-form');
            const legalForm = document.getElementById('legal-form');
            const clientTypeSelection = document.querySelector('.mb-6'); // Блок выбора типа клиента

            function updateContinueButton() {
                if (individualRadio.checked || legalRadio.checked) {
                    continueBtn.disabled = false;
                    continueBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    continueBtn.classList.add('cursor-pointer');
                } else {
                    continueBtn.disabled = true;
                    continueBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    continueBtn.classList.remove('cursor-pointer');
                }
            }

            function showRegistrationForm() {
                if (individualRadio.checked) {
                    // Show individual form, hide legal form
                    individualForm.style.display = 'block';
                    legalForm.style.display = 'none';
                    // Make individual fields required
                    document.getElementById('individual_name').required = true;
                    document.getElementById('individual_phone').required = true;
                    // Make legal fields not required
                    document.getElementById('legal_unp').required = false;
                    document.getElementById('legal_name').required = false;
                    document.getElementById('legal_phone').required = false;
                } else if (legalRadio.checked) {
                    // Show legal form, hide individual form
                    individualForm.style.display = 'none';
                    legalForm.style.display = 'block';
                    // Make legal fields required
                    document.getElementById('legal_unp').required = true;
                    document.getElementById('legal_name').required = true;
                    document.getElementById('legal_phone').required = true;
                    // Make individual fields not required
                    document.getElementById('individual_name').required = false;
                    document.getElementById('individual_phone').required = false;
                }
                
                // Show registration form and hide client type selection
                registrationForm.style.display = 'block';
                clientTypeSelection.style.display = 'none';
            }

            function showClientTypeSelection() {
                // Hide registration form and show client type selection
                registrationForm.style.display = 'none';
                clientTypeSelection.style.display = 'block';
                // Reset form fields
                individualForm.style.display = 'none';
                legalForm.style.display = 'none';
                // Uncheck radio buttons
                individualRadio.checked = false;
                legalRadio.checked = false;
                // Reset form
                document.querySelector('form').reset();
                updateContinueButton();
            }

            // Event listeners for radio buttons - сразу показываем форму
            individualRadio.addEventListener('change', function() {
                if (individualRadio.checked) {
                    showRegistrationForm();
                }
            });
            
            legalRadio.addEventListener('change', function() {
                if (legalRadio.checked) {
                    showRegistrationForm();
                }
            });

            // Event listener for continue button (если понадобится)
            continueBtn.addEventListener('click', function() {
                if (!continueBtn.disabled) {
                    showRegistrationForm();
                }
            });

            // Event listener for back button
            backBtn.addEventListener('click', function() {
                showClientTypeSelection();
            });

            // Initialize on page load
            updateContinueButton();
            
            // If there's a success message, reset the form
            @if (session('success'))
                showClientTypeSelection();
                // Auto-hide success message after 5 seconds
                setTimeout(function() {
                    const successMessage = document.getElementById('success-message');
                    if (successMessage) {
                        successMessage.style.transition = 'opacity 0.5s ease-out';
                        successMessage.style.opacity = '0';
                        setTimeout(function() {
                            successMessage.remove();
                        }, 500);
                    }
                }, 5000);
            @endif
        });
    </script>
</x-guest-layout>
