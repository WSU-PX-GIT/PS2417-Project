<x-guest-layout>

    <script>
        function hide() {
            var x = document.getElementById("agencyname")
            x.style.display = "none";
        }
    </script>
    <form method="POST" action="{{ route('register') }}" onload="hide()">
        @csrf


        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <script>

            function getComboA(selectObject) {
                var value = selectObject.value;
                if(value == "agency"){
                    var x = document.getElementById("agencyname")
                    x.style.display = "block";
                }
            }
        </script>

        <!-- User Select -->
        <div class="mt-4">
            <x-input-label for="usertype" :value="__('User Select')" />
            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="usertype" name="usertype" onchange="getComboA(this)">
                <option value="">-- Select User Type --</option>
                <option value="agency">Agency User</option>
                <option value="agent">Agent User</option>
            </select>
            {{-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" /> --}}
            <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
        </div>


        <div class="agencyname" >
            <x-input-label for="agencyname" :value="__('Agency Name')" />
            <x-text-input id="agencyname" class="block mt-1 w-full" type="text" name="agencyname" required autocomplete="Agency Name" />
            <x-input-error :messages="$errors->get('agencyname')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
