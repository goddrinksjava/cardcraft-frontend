<x-layout title="{{ $anime->title }}">
    <div class="bg-white dark:bg-gray-900 flex flex-col items-center min-h-screen">
        @include('shared.navbar')


        <div class="flex py-8 px-8 lg:px-0 w-full lg:w-2/3">
            <div>
                <div class="flex flex-row justify-between items-center">
                    <div>
                        <h2 class="text-5xl font-bold text-gray-700 dark:text-white">
                            {{ $anime->title }}
                        </h2>
                    </div>
                    <div class="w-[200px] h-[300px]">
                        <img class="w-full h-full object-cover" src="/storage/posters/{{ $anime->id }}" alt="Poster">
                    </div>
                </div>

                <div class="flex">
                    <a class="block text-xl text-gray-700 dark:text-white hover:underline mr-4"
                        href="/anime/1/info">Info</a>
                    <a class="block text-xl font-extrabold text-gray-700 dark:text-white hover:underline mr-4"
                        href="/anime/1/characters">Characters</a>
                    <a class="block text-xl text-gray-700 dark:text-white hover:underline"
                        href="/anime/1/reviews">Reviews</a>
                </div>

                <div class="mt-6">
                    @foreach ($anime->characters as $character)
                        <div class="flex items-center my-4">
                            <div class="flex-shrink-0 w-[150px] h-[150px] mr-4">
                                <img class="w-full h-full object-cover" src="/storage/characters/{{ $character->id }}"
                                    alt="Character Picture" />
                            </div>
                            <p class="font-bold text-gray-700 dark:text-white">{!! nl2br($character->description) !!}</p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-layout>
