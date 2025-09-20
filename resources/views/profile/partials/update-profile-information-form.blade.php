<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Информация профиля
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Обновите информацию профиля и адрес электронной почты вашего аккаунта.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Имя" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" value="Электронная почта" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        Ваш адрес электронной почты не подтвержден.

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Нажмите здесь, чтобы повторно отправить письмо с подтверждением.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            Новая ссылка для подтверждения была отправлена на ваш адрес электронной почты.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="client_type" value="Тип клиента" />
            <select id="client_type" name="client_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="individual" {{ old('client_type', $user->client_type) === 'individual' ? 'selected' : '' }}>Физическое лицо</option>
                <option value="legal" {{ old('client_type', $user->client_type) === 'legal' ? 'selected' : '' }}>Юридическое лицо</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('client_type')" />
        </div>

        <div>
            <x-input-label for="phone" value="Телефон" />
            <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone', $user->phone)" placeholder="+375 (XX) XXX-XX-XX" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <!-- Поля для юридических лиц -->
        <div id="legal-fields" style="display: {{ old('client_type', $user->client_type) === 'legal' ? 'block' : 'none' }}">
            <div>
                <x-input-label for="unp" value="УНП (Уникальный номер плательщика)" />
                <x-text-input id="unp" name="unp" type="text" class="mt-1 block w-full" :value="old('unp', $user->unp)" placeholder="123456789" maxlength="9" pattern="[0-9]{9}" />
                <x-input-error class="mt-2" :messages="$errors->get('unp')" />
                <p class="mt-1 text-sm text-gray-600">9 цифр без пробелов и дефисов</p>
            </div>

            <div>
                <x-input-label for="company_name" value="Название компании" />
                <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" :value="old('company_name', $user->company_name)" placeholder="ООО 'Название компании'" />
                <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
            </div>
        </div>

        <div class="flex items-center justify-end gap-4">
            <x-primary-button>Сохранить</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >Сохранено.</p>
            @endif
        </div>
    </form>

    <!-- JavaScript для динамического показа полей -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clientTypeSelect = document.getElementById('client_type');
            const legalFields = document.getElementById('legal-fields');
            const unpField = document.getElementById('unp');
            const companyNameField = document.getElementById('company_name');

            function toggleLegalFields() {
                if (clientTypeSelect.value === 'legal') {
                    legalFields.style.display = 'block';
                    unpField.required = true;
                    companyNameField.required = true;
                } else {
                    legalFields.style.display = 'none';
                    unpField.required = false;
                    companyNameField.required = false;
                    // Очищаем поля при скрытии
                    unpField.value = '';
                    companyNameField.value = '';
                }
            }

            clientTypeSelect.addEventListener('change', toggleLegalFields);

            // Инициализация при загрузке страницы
            toggleLegalFields();

            // Форматирование УНП (только цифры)
            if (unpField) {
                unpField.addEventListener('input', function(e) {
                    e.target.value = e.target.value.replace(/\D/g, '');
                    if (e.target.value.length > 9) {
                        e.target.value = e.target.value.slice(0, 9);
                    }
                });
            }

            // Форматирование телефона
            const phoneField = document.getElementById('phone');
            if (phoneField) {
                phoneField.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 0) {
                        if (value.startsWith('375')) {
                            // Белорусский номер
                            if (value.length <= 3) {
                                e.target.value = '+' + value;
                            } else if (value.length <= 5) {
                                e.target.value = '+' + value.slice(0, 3) + ' (' + value.slice(3);
                            } else if (value.length <= 8) {
                                e.target.value = '+' + value.slice(0, 3) + ' (' + value.slice(3, 5) + ') ' + value.slice(5);
                            } else if (value.length <= 10) {
                                e.target.value = '+' + value.slice(0, 3) + ' (' + value.slice(3, 5) + ') ' + value.slice(5, 8) + '-' + value.slice(8);
                            } else {
                                e.target.value = '+' + value.slice(0, 3) + ' (' + value.slice(3, 5) + ') ' + value.slice(5, 8) + '-' + value.slice(8, 10) + '-' + value.slice(10, 12);
                            }
                        } else {
                            // Простое форматирование
                            e.target.value = value;
                        }
                    }
                });
            }
        });
    </script>
</section>
