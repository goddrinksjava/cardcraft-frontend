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
                    <a class="block text-xl font-extrabold text-gray-700 dark:text-white hover:underline mr-4"
                        href="/anime/1/info">Info</a>
                    <a class="block text-xl text-gray-700 dark:text-white hover:underline mr-4"
                        href="/anime/1/characters">Characters</a>
                    <a class="block text-xl text-gray-700 dark:text-white hover:underline"
                        href="/anime/1/reviews">Reviews</a>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-bold text-gray-700 dark:text-white">Synopsis</p>
                    <p class="text-gray-700 dark:text-white">{!! nl2br($anime->synopsis) !!}</p>
                </div>

                <div class="flex justify-between flex-wrap mt-6">
                    <div>
                        <h1 class="text-xl text-gray-600 dark:text-gray-200">Genres</h1>
                        @foreach ($anime->genres as $genre)
                            <span class="relative inline-block px-3 py-1 font-semibold text-gray-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-gray-200 opacity-50 rounded-full"></span>
                                <span class="relative">{{ $genre->name }}</span>
                            </span>
                        @endforeach
                    </div>


                    <div>
                        <video width="512" height="288" controls>
                            <source src="/storage/trailers/{{ $anime->id }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-layout>
