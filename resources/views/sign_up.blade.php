<x-layout title="Sign up">
    <div class="bg-white dark:bg-gray-900 flex justify-center h-screen lg:divide-x dark:divide-gray-700">
        <div class="flex-auto hidden lg:flex flex-col justify-center items-center">
            <div class="flex flex-col w-full h-full max-w-full max-h-full p-16 text-center">
                <x-rainbow-canvas class="flex-1 min-w-0 min-h-0 mb-4" mask="/svg/fox.svg" />
                <a href="/" class="hover:underline text-8xl font-bold text-gray-700 dark:text-white">Rate Your Anime</a>
            </div>
        </div>

        <div class="flex pt-8 lg:pt-0 items-center w-full px-6 mx-auto lg:w-5/12">
            <div class="flex-1">
                <div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-700 dark:text-white">
                        Join us to enjoy the best anime experience
                    </h2>
                    <p class="mt-6 text-sm text-gray-400">
                        Already have an account? <a href="/sign-in"
                            class="text-blue-500 focus:outline-none focus:underline hover:underline">Sign in</a>.
                    </p>
                </div>

                <x-errors></x-errors>

                <div class="mt-8">
                    <form action="/auth/sign-up" method="POST">
                        @csrf

                        <div>
                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email
                                Address</label>
                            <input type="email" name="email" id="email" placeholder="example@example.com"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="mt-6">
                            <label for="password" class="text-sm text-gray-600 dark:text-gray-200">Password</label>

                            <input type="password" name="password" id="password" placeholder="Your Password"
                                autocomplete="new-password"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="mt-6">
                            <label for="confirmPassword" class="text-sm text-gray-600 dark:text-gray-200">Confirm
                                Password</label>

                            <input type="password" name="confirmPassword" id="confirmPassword"
                                placeholder="Type Your Password Again"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>

                        <div class="mt-6">
                            <button
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Sign up
                            </button>
                        </div>
                    </form>

                    <button
                        class="w-full px-4 py-2 tracking-wide mt-4 font-semibold text-gray-900 bg-white border-2 dark:border-0 border-gray-500 rounded-md shadow outline-none hover:bg-blue-50 hover:border-blue-400 focus:outline-none">
                        <img height="28" width="28" class="inline pr-2" src="/svg/Google.svg" alt="Google" />
                        Sign up with Google</button>
                    <button
                        class="w-full px-4 py-2 tracking-wide mt-4 mb-4 font-semibold text-gray-900 bg-white border-2 dark:border-0 border-gray-500 rounded-md shadow outline-none hover:bg-blue-50 hover:border-blue-400 focus:outline-none">
                        <img height="28" width="28" class="inline pr-2" src="/svg/Twitter.svg" alt="Twitter" />
                        Sign up with Twitter</button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
