<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--
    <link rel="stylesheet" href="{{asset('authcss/register.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('authcss/register.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    {{-- Ajax for different register info --}}
    <script>
        function getRegisterInfo(){
            var register_type = $("#register_type").val();
            $.ajax({
                type: 'POST',
                url: '/getRegisterInfo',
                data: {
                    _token: "{{csrf_token()}}",
                    register_type: register_type
                },
                dataType: 'json',
                success: function (data) {
                    $("#register_info").html(data.msg);
                    console.log(data.msg);
                  }
            })
        }
    </script>

</head>

<body>
    <x-guest-layout>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">
                <x-input-label for="register_type" :value="__('Register Type')" />
                <select name="register_type" id="register_type" class="register_type" onchange="getRegisterInfo()">
                    <option value="renter">Renter</option>
                    <option value="owner">Owner</option>
                </select>
                <x-input-error :messages="$errors->get('register_type')" class="mt-2" />
            </div>


            {{-- Register Info --}}
            <div class="mt-4">
                @include('auth.renter_info')
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</body>

</html>