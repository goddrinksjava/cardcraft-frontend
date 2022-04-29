<x-layout title="{{ $review->user->email }}">
    <div class="bg-white dark:bg-gray-900 flex justify-center items-center min-h-screen">
        <div class="flex px-8 lg:px-0 w-full lg:w-2/3">
            <div class="flex-1">

                <div class>
                    <div>
                        <h2 class="text-5xl font-bold text-gray-700 dark:text-white">
                            {{ $review->anime->title }}
                        </h2>
                    </div>
                </div>

                <p class="text-3xl font-bold text-gray-700 dark:text-white">{{ $review->user->email }}</p>

                <div class="mt-6">
                    <p class="text-xl font-bold text-gray-700 dark:text-white">{{ $review->updated_at }}</p>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-bold text-gray-700 dark:text-white">Score: {{ $review->score }}</p>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-bold text-gray-700 dark:text-white">Comment</p>
                    <p class="text-gray-700 dark:text-white">{!! nl2br($review->comment) !!}</p>
                </div>


                <div class="mt-6 text-center">
                    <a href="{{ url('/admin/reviews/' . $review->id . '/edit') }}"
                        class="block text-gray-300 bg-gray-800 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Edit
                    </a>
                </div>

                <form action="/admin/reviews/{{ $review->id }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="mt-1 text-center">
                        <button type="submit"
                            class="w-full text-gray-300 bg-rose-900 hover:bg-rose-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Delete
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</x-layout>
