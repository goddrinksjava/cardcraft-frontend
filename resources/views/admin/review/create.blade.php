<x-layout title="Create Review">
    <div class="bg-white dark:bg-gray-900 flex justify-center min-h-screen">

        <div class="flex items-center px-8 lg:px-0 w-full lg:w-1/2">

            <div class="flex-1">

                <form action="/admin/reviews" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-row justify-between flex-wrap items-center">
                        <div>
                            <h2 class="text-5xl font-bold text-gray-700 dark:text-white">
                                Create Review
                            </h2>
                        </div>
                    </div>

                    <x-errors></x-errors>

                    <div class="mt-8">
                        <x-textarea name="comment" placeholder="What is your opinion on this anime?" label="Comment" />
                        <x-numeric-input name="score" label="Score" value="1" min="1" max="10" step="1" />

                        <div class="mt-6">
                            <label class="text-sm text-gray-600 dark:text-gray-200" for="anime">Anime</label>

                            <select
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                id="anime" name="anime">
                                <option disabled selected value class="hidden"></option>
                                @foreach ($anime as $a)
                                    <option value="{{ $a->id }}">{{ $a->title }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mt-6">
                            <label class="text-sm text-gray-600 dark:text-gray-200" for="user">User</label>

                            <select
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                id="user" name="user">
                                <option disabled selected value class="hidden"></option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-6">
                            <button id="submitButton"
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
