<div id="register_info">
    {{-- Name --}}
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
            autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
            autocomplete="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    {{-- Phone Number --}}
    <div class="mt-4">
        <x-input-label for="phnumber" :value="__('Phone Number')" />
        <x-text-input id="phnumber" class="block mt-1 w-full" type="tel" name="phnumber" :value="old('phnumber')"
            required autocomplete="tel" />
        <x-input-error :messages="$errors->get('phnumber')" class="mt-2" />
    </div>

    {{-- Address --}}
    <div class="mt-4">
        <x-input-label for="address" :value="__('Address')" />
        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required
            autocomplete="address" />
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
            required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>
</div>