<x-layout title="Create User">
    <div class="bg-white dark:bg-gray-900 flex justify-center min-h-screen">


        <div class="flex items-center px-8 lg:px-0 w-full lg:w-1/2">
            <div class="flex-1">
                <div>
                    <h2 class="text-5xl font-bold text-gray-700 dark:text-white">
                        Create User
                    </h2>
                    @if ($submitted ?? '' == 'ok')
                        <p class="mt-6 text-sm text-gray-400">
                            User successfully created
                        </p>
                    @endif
                </div>

                @if ($errors->any())
                    <div role="alert" class="mt-4">
                        <div class="bg-rose-800 text-white font-bold rounded-t px-4 py-2">
                            Errors
                        </div>
                        <div class="border border-t-0 border-rose-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="mt-8">
                    <form action="/users" method="POST">
                        @csrf

                        <div>
                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">
                                Email Address
                            </label>
                            <input required type="email" name="email" id="email" placeholder="example@example.com"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <label for="password" class="text-sm text-gray-600 dark:text-gray-200">Password</label>
                            </div>

                            <input required type="password" name="password" id="password" placeholder="Your Password"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <label for="confirmPassword" class="text-sm text-gray-600 dark:text-gray-200">
                                    Confirm Password
                                </label>
                            </div>

                            <input required type="confirmPassword" name="confirmPassword" id="confirmPassword"
                                placeholder="Confirm Password"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <label for="imageUrl" class="text-sm text-gray-600 dark:text-gray-200">Image Url</label>
                            </div>

                            <input type="imageUrl" name="imageUrl" id="imageUrl" placeholder="https://picsum.photos/200"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="mt-6">
                            <input type="checkbox" id="verifiedEmail" name="verifiedEmail" class="mr-1">
                            <label for="verifiedEmail" class="text-sm text-gray-600 dark:text-gray-200">
                                Verified Email
                            </label>
                        </div>

                        <div class="mt-6">
                            <button id="submitButton"
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
