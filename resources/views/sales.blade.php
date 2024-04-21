<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="">

        <div class="flex h-screen">
            <!-- Main Content -->
            <div class="flex-1 mx-10 mt-4 ">
                <div class="flex-1 mx-10 mt-4 ">
                    <!-- You can open the modal using ID.showModal() method -->
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="text-center justify-center  mx-auto mt-20">
                                    <p class="text-white bg-red-600 px-8 py-4 rounded-lg text-lg"> <span
                                            class="text-xl"> Total Sales :</span> ${{ number_format($Total, 2, ',', '.') }}
                                    </p>
                                </div>
                                <div class="overflow-hidden">
                                    <form action="{{ route('sales.create') }}" method="get" class="w-1/3 m-5">
                                        @csrf
                                        <select name="sorting" onchange="this.form.submit()" tabindex="0"
                                            class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded w-52">
                                            <option value="" selected>Sort</option>
                                            <option value="day">One Day Ago</option>
                                            <option value="week">One week Ago</option>
                                            <option value="month">One Month Ago</option>
                                            <option value="year">One Year Ago</option>
                                        </select>
                                    </form>
                                    <table class=" min-w-full table">
                                        <thead class="bg-white border-b">
                                            <tr class="hover">
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    #
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Model Car
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Buyer
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Seller
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    Price
                                                </th>
                                                <th scope="col"
                                                    class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                    created At
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sales as $product)
                                                <tr class="bg-gray-100 border-b-1 border-gray-500 hover">
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $loop->iteration }}</td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $product->cars->model }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $product->buyer->name }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $product->seller->name }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        ${{ $product->cars->price }}
                                                    </td>
                                                    <td
                                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{ $product->created_at->diffForHumans(['parts' => 2]) }}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $sales->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
