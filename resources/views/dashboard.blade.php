<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @role('guest')
        <div class="text-center mx-auto w-1/2 mt-8 bg-red-600 px-10 py-6 rounded">
            <h1 class="text-white text-xl ">
                Please wait until the admin accepts you
            </h1>
        </div>
    @endrole
    @role('super-admin')
        <div class="">
            <div class="flex h-screen">
                <x-sidebar />

                <!-- Main Content -->
                <div class="flex-1 mx-10 mt-4 ">
                    <div class="flex gap-10 ">
                        <div class="px-28 block bg-blue-500 text-white rounded text-center py-14">
                            selles
                            <p>{{ $salesCount }}</p>
                        </div>
                        <div class="px-28 block bg-amber-500 text-white rounded text-center py-14">
                            users
                            <p>{{ $UserCount }}</p>
                        </div>
                        <div class="px-28 block bg-red-500 text-white rounded text-center py-14">
                            posts
                            <p>{{ $CarCount }}</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    @endrole

    @role('buyer')
        <div class="">
            <div class="flex h-screen">
                <!-- Main Content -->
                <div class="flex-1 mx-10 mt-4 ">
                    <div class="flex-1 mx-10 mt-4 bg-white p-5 rounded ">
                        welcome {{ auth()->user()->name }}

                    </div>
                </div>
            </div>

        </div>
    @endrole
    @role('seller')
        <div class="">
            <div class="flex h-screen">
                <!-- Main Content -->
                <div class="flex-1 mx-10 mt-4 ">
                    <div class="flex-1 mx-10 mt-4 ">
                        <!-- You can open the modal using ID.showModal() method -->
                        <button class="btn btn-primary text-white" onclick="my_modal_4.showModal()">Add +</button>
                        <dialog id="my_modal_4" class="modal w-1/2 mx-auto">
                            <div class="modal-box w-full max-w-5xl">
                                <h3 class="font-bold text-lg">Car Form</h3>
                                <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Name -->
                                    <!-- Name -->
                                    <div>
                                        <x-input-label for="company" :value="__('company')" />
                                        <x-text-input id="company" class="block mt-1 w-full" type="text"
                                            name="company" :value="old('company')" required autofocus autocomplete="company" />
                                        <x-input-error :messages="$errors->get('company')" class="mt-2" />
                                    </div>

                                    <!-- brand -->
                                    <div>
                                        <x-input-label for="model" :value="__('model')" />
                                        <x-text-input id="model" class="block mt-1 w-full" type="text"
                                            name="model" :value="old('model')" required autofocus autocomplete="model" />
                                        <x-input-error :messages="$errors->get('model')" class="mt-2" />
                                    </div>
                                    <!-- brand -->
                                    <div>
                                        <x-input-label for="price" :value="__('price')" />
                                        <x-text-input id="price" class="block mt-1 w-full" type="text"
                                            name="price" :value="old('price')" required autofocus autocomplete="price" />
                                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="year" :value="__('year')" />
                                        <x-text-input id="year" class="block mt-1 w-full" type="number"
                                            name="year" :value="old('year')" required autofocus autocomplete="year" />
                                        <x-input-error :messages="$errors->get('year')" class="mt-2" />
                                    </div>

                                    <div>
                                        <x-input-label for="details" :value="__('details')" />
                                        <textarea class="textarea textarea-primary" name="details" placeholder="Bio"></textarea>
                                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                                    </div>
                                    <!-- image -->
                                    <div>
                                        <x-input-label for="image" :value="__('Image')" />
                                        <x-text-input id="image"
                                            class="block mt-1  file-input file-input-bordered w-full max-w-xs"
                                            type="file" name="image" :value="old('image')" required autofocus
                                            autocomplete="image" />
                                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                    </div>
                                    <x-primary-button class="mt-4">
                                        {{ __('Submit') }}
                                    </x-primary-button>
                                </form>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <button class="btn btn-error text-white">Close</button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class=" min-w-full table">
                                            <thead class="bg-white border-b">
                                                <tr class="hover">
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        #
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Company
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Model
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Price
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Year
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        created At
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($carsMe as $product)
                                                    <tr class="bg-gray-100 border-b-1 border-gray-500 hover">
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            {{ $loop->iteration }}</td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $product->company }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $product->model }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            ${{ $product->price }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $product->year }} y
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $product->created_at->diffForHumans() }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light flex gap-4 px-6 py-4 whitespace-nowrap">
                                                            <form action="{{ route('cars.destroy', $product->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="text-red-500 underline"
                                                                    onclick="return confirm('Are you sure to delete this Car?')">Delete</button>
                                                            </form>
                                                            <button class="text-amber-400 "
                                                                onclick="my_modal_1.showModal()">Edit</button>
                                                            <dialog id="my_modal_1" class="modal w-1/2 mx-auto">
                                                                <div class="modal-box w-full max-w-5xl">
                                                                    <h3 class="font-bold text-lg">Medicine Form</h3>
                                                                    <form method="POST" enctype="multipart/form-data"
                                                                        action="{{ route('cars.update', $product->id) }}">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <!-- Name -->
                                                                        <!-- Name -->
                                                                        <div>
                                                                            <x-input-label for="company"
                                                                                :value="__('company')" />
                                                                            <x-text-input id="company"
                                                                                class="block mt-1 w-full" type="text"
                                                                                name="company" :value="$product->company" required
                                                                                autofocus autocomplete="company" />
                                                                            <x-input-error :messages="$errors->get('company')"
                                                                                class="mt-2" />
                                                                        </div>

                                                                        <!-- brand -->
                                                                        <div>
                                                                            <x-input-label for="model"
                                                                                :value="__('model')" />
                                                                            <x-text-input id="model"
                                                                                class="block mt-1 w-full" type="text"
                                                                                name="model" :value="$product->model" required
                                                                                autofocus autocomplete="model" />
                                                                            <x-input-error :messages="$errors->get('model')"
                                                                                class="mt-2" />
                                                                        </div>
                                                                        <!-- brand -->
                                                                        <div>
                                                                            <x-input-label for="price"
                                                                                :value="__('price')" />
                                                                            <x-text-input id="price"
                                                                                class="block mt-1 w-full" type="text"
                                                                                name="price" :value="$product->price" required
                                                                                autofocus autocomplete="price" />
                                                                            <x-input-error :messages="$errors->get('price')"
                                                                                class="mt-2" />
                                                                        </div>
                                                                        <div>
                                                                            <x-input-label for="year"
                                                                                :value="__('year')" />
                                                                            <x-text-input id="year"
                                                                                class="block mt-1 w-full" type="number"
                                                                                name="year" :value="$product->year" required
                                                                                autofocus autocomplete="year" />
                                                                            <x-input-error :messages="$errors->get('year')"
                                                                                class="mt-2" />
                                                                        </div>

                                                                        <div>
                                                                            <x-input-label for="details"
                                                                                :value="__('details')" />
                                                                            <textarea class="textarea textarea-primary" name="details" placeholder="Bio">{{ $product->details }}</textarea>
                                                                            <x-input-error :messages="$errors->get('details')"
                                                                                class="mt-2" />
                                                                        </div>
                                                                        <!-- image -->
                                                                        <div>
                                                                            <x-input-label for="image"
                                                                                :value="__('Image')" />
                                                                            <x-text-input id="image"
                                                                                class="block mt-1  file-input file-input-bordered w-full max-w-xs"
                                                                                type="file" name="image"
                                                                                :value="old('image')" required autofocus
                                                                                autocomplete="image" />
                                                                            <x-input-error :messages="$errors->get('image')"
                                                                                class="mt-2" />
                                                                        </div>
                                                                        <x-primary-button class="mt-4">
                                                                            {{ __('Submit') }}
                                                                        </x-primary-button>
                                                                    </form>
                                                                    <div class="modal-action">
                                                                        <form method="dialog">
                                                                            <button
                                                                                class="btn btn-error text-white">Close</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </dialog>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Place this JavaScript code at the bottom of your HTML file, just before the closing </body> tag -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('my_modal_1');
        const editButton = document.querySelector('.text-amber-400');
        const closeButton = modal.querySelector('.btn-error');

        editButton.addEventListener('click', function () {
            modal.showModal();
        });

        closeButton.addEventListener('click', function () {
            modal.close();
        });
    });
</script>

    @endrole


</x-app-layout>
