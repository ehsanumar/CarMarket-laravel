<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BestPrice</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <x-NavBar />

    <div class="bg-gray-200  py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div class="h-[460px] rounded-lg bg-gray-300  mb-4">
                        <img class="w-full h-full object-cover rounded"
                            src="{{ asset('storage/image/' . $productes->image) }}" alt="Product Image">
                    </div>
                </div>
                <div class="md:flex-1 px-4">
                    <h2 class="text-2xl font-bold text-gray-800  dark:text-white mb-2">Company:
                        {{ $productes->company }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 text-justify text-sm mb-4">
                        <b> Descreption:</b> <br> {{ $productes->details }}
                    </p>
                    <div class="flex mb-4 gap-4">
                        <div class="mr-4">
                            <span class="font-bold text-gray-700 dark:text-gray-300">Price:</span>
                            <span class="text-gray-600 dark:text-gray-300">${{ $productes->price }}</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700 dark:text-gray-300">Seller:</span>
                            <span class="text-gray-600 dark:text-gray-300">{{ $productes->user->name }}</span>
                        </div>

                    </div>
                    <div class="flex -mx-2 mb-4">
                        <div class="w-1/2 px-2">
                            <!-- You can open the modal using ID.showModal() method -->
                            <form action="{{ route('sales.store') }}" method="post" class="w-full bg-gray-900  text-gray-100 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-700">
                                        @csrf
                                        <input type="number" name="car_id" required value="{{ $productes->id }}"
                                            hidden>
                                        <input type="number" name="seller_id" required value="{{ $productes->user->id }}"
                                            hidden>
                                        <input type="number" name="price" required value="{{$productes->price}}"
                                            hidden>
                                        <button class="">
                                            {{ __('Buy Now') }}
                                        </button>
                                    </form>
                        </div>
                        <div class="w-1/2 px-2">
                            <!-- You can open the modal using ID.showModal() method -->
                            <button
                                class="w-full bg-gray-900  text-gray-100 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-700"
                                onclick="my_modal_4.showModal()">Comment</button>
                            <dialog id="my_modal_4" class="modal">
                                <div class="modal-box w-1/2 max-w-5xl">
                                    <h3 class="font-bold text-lg">Comment</h3>
                                    <form action="{{ route('comments.store') }}" method="post">
                                        @csrf
                                        <!-- details -->
                                        <div>
                                            <textarea class="textarea textarea-primary w-full mt-2" name="comment" placeholder="message"></textarea>
                                            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                                        </div>
                                        <input type="number" name="car_id" required value="{{ $productes->id }}"
                                            hidden>
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
                        </div>
                        <div class="w-1/2 px-2">
                            <!-- You can open the modal using ID.showModal() method -->
                            <button
                                class="w-full bg-gray-900  text-gray-100 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-700"
                                onclick="my_modal_3.showModal()">See Comments</button>
                            <dialog id="my_modal_3" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                        <button
                                            class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="font-bold text-lg text-center">Comments</h3>
                                    @foreach ($comments as $comment)
                                        <div class="chat chat-start">
                                            <div class="chat-image avatar">
                                                <div class="avatar placeholder">
                                                    <div
                                                        class="bg-neutral text-neutral-content rounded-full inline-flex justify-center items-center" style="width: 48px;">
                                                        <span
                                                            class="text-10xl">{{ strtoupper(substr($comment->user->name, 0, 1)) }}</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="chat-header ml-2">
                                                {{ $comment->user->name }}
                                            </div>
                                            <div class="chat-bubble">{{ $comment->comment }}
                                                <br>

                                                <div class="flex justify-between items-center space-x-8">
                                                    @if (auth()->id() === $comment->user_id)
                                                        <form
                                                            action="{{ route('comments.destroy', ['comment' => $comment->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="text-red-400 underline"
                                                                onclick="return confirm('Are you sure to delete this Comment?')">Delete</button>
                                                        </form>
                                                    @endif
                                                    <time
                                                        class="text-xs text-gray-400 ">{{ $comment->created_at->diffForHumans() }}</time>
                                                </div>

                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                        </div>
                        </dialog>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</body>

</html>
