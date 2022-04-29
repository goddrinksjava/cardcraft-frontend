<x-layout title="{{ $character->name }}">
    <div class="bg-white dark:bg-gray-900 flex justify-center items-center min-h-screen">
        <div class="flex px-8 lg:px-0 w-full lg:w-2/3">
            <div class="flex-1">

                <div class="flex flex-row justify-between items-center">
                    <div>
                        <h2 class="text-5xl font-bold text-gray-700 dark:text-white">
                            {{ $character->name }}
                        </h2>
                        <p class="mt-4 text-xl font-bold text-gray-700 dark:text-white">
                            {{ $character->anime->title }}
                        </p>
                    </div>
                    <div class="w-[200px] h-[200px]">
                        <img class="w-full h-full object-cover" src="/storage/characters/{{ $character->id }}"
                            alt="Poster">
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-bold text-gray-700 dark:text-white">Description</p>
                    <p class="text-gray-700 dark:text-white">{!! nl2br($character->description) !!}</p>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ url('/admin/characters/' . $character->id . '/edit') }}"
                        class="block text-gray-300 bg-gray-800 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Edit
                    </a>
                </div>

                <form action="/admin/characters/{{ $character->id }}" method="POST">
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
