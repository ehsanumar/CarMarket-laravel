<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car MArket</title>
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center mt-1">
                        <a href="/" class="h-8 w-auto text-blue-500">Car Market</a>
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">

                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            @auth
                                <a href="{{ route('dashboard') }}"
                                    class="text-gray-100  hover:bg-gray-700 block rounded-md px-3 py-2 text-base font-medium">@lang('message.dashboard')</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">@lang('message.login')</a>
                                <a href="{{ route('register') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">@lang('message.register')</a>
                            @endauth
                            <a href="{{ route('cars.create') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">@lang('message.cars')</a>

                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">@lang('message.about')</a>
                            <a href="#"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">@lang('message.contact')</a>

                            <a href="{{ route('locale',['lang' => 'ckb']) }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Kurdish</a>

                            <a href="{{ route('locale',['lang' => 'ar']) }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Arabic</a>

                            <a href="{{ route('locale',['lang' => 'en']) }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">English</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </nav>

</body>

</html>
