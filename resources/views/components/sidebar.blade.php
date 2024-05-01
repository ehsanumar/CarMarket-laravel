   <!-- Sidebar -->
            <div class="bg-gray-800 text-white w-64 flex flex-col">
                <div class="p-4 border-b border-gray-700">
                    <h2 class="text-lg font-semibold">{{ auth()->user()->name }}</h2>
                </div>
                <nav class="flex-1 overflow-y-auto h-full">
                    <a href="/" class="block p-4 hover:bg-gray-700">@lang('message.home')</a>
                    <a href="{{ route('guests') }}" class="block p-4 hover:bg-gray-700">@lang('message.guests')</a>
                    <a href="{{ route('seller') }}" class="block p-4 hover:bg-gray-700">@lang('message.seller')</a>
                    <a href="{{ route('buyer') }}" class="block p-4 hover:bg-gray-700">@lang('message.buyer')</a>
                    <a href="{{ route('cars.create') }}" class="block p-4 hover:bg-gray-700">@lang('message.cars')</a>
                    <a href="{{ route('sales.index') }}" class="block p-4 hover:bg-gray-700">@lang('message.sales')</a>
                </nav>


            </div>
