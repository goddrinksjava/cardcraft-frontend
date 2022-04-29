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
                    <a class="block text-xl text-gray-700 dark:text-white hover:underline mr-4"
                        href="/anime/1/characters">Characters</a>
                    <a class="block text-xl font-extrabold text-gray-700 dark:text-white hover:underline"
                        href="/anime/1/reviews">Reviews</a>
                </div>

                <div class="my-8">
                    <div class="flex justify-between mb-2">
                        <p class="text-xl font-bold text-gray-700 dark:text-white">Honsho</p>
                        <p class="text-xl text-gray-700 dark:text-white">Rating: 9</p>
                    </div>
                    <p class="text-gray-700 dark:text-white">
                        An interesting take on Mr. & Mrs. Smith-style stories. The daughter, Anya, is the one who really
                        drives the story. Her interactions with the cast are a delight to watch, and I always look
                        forward to how she will nudge those around her into performing actions. She really is a child
                        puppetmaster.

                        The "father" and "mother" are also superb, and make wonderful tsunderes. They are also quite
                        competent.

                        I really enjoy how even mundane activities are transformed into amazing action spectacles. The
                        authors are really good at writing and drawing action sequences.

                        In sum, this manga has a great mix of action, romance, comedy, and family themes. I really enjoy
                        it, and would strongly recommend it.
                    </p>
                </div>

                <div class="my-8">
                    <div class="flex justify-between mb-2">
                        <p class="text-xl font-bold text-gray-700 dark:text-white">Kihhat</p>
                        <p class="text-xl text-gray-700 dark:text-white">Rating: 8</p>
                    </div>
                    <p class="text-gray-700 dark:text-white">
                        Spy X Family is a manga that is well-written, well-drawn, and well thought out. The themes are –
                        relative to other anime – sufficiently innovative without losing the touch of familiarity. The
                        characters have interesting personalities, hilarious motives, and unique designs. The premise is
                        immediately eye-catching and the execution superb. The story manages to excel in occupying a
                        mean between simplicity and complexity, making this a joy to read without being needlessly
                        complicated. All of this makes Spy X Family an easily recommendable pick. This manga has
                        something to offer to everyone from slice of life comedy to bombastic action, but – of course –
                        always with an emphasis on comedy.
                    </p>
                </div>


            </div>
        </div>
    </div>
</x-layout>
