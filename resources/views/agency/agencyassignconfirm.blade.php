<x-appagency-layout>
    <body>
    <div class="main-area">
        <h2>Edit CPD</h2>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('editAgencyUserConfirm', $user->id) }}" >
            @csrf
            <div class="mt-4">
                <x-input-label for="usertype" :value="__('Role Select')" />
                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="usertype" name="usertype">
                    <option value="">-- Select Role for User --</option>
                    <option value="agency">Agency Admin</option>
                    <option value="agent">Agency Agent</option>
                </select>
                {{-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" /> --}}
                <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>

        </form>

    </div>

    </body>
</x-appagency-layout>
