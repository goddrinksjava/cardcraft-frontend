<x-layout title="{{ $user->email }}">
    <div class="bg-white dark:bg-gray-900 flex justify-center items-center min-h-screen">
        <div class="flex  px-8 lg:px-0 w-full lg:w-1/2">
            <div class="flex-1">

                <div class="flex flex-row justify-between items-center">
                    <div>
                        <h2 class="text-5xl font-bold text-gray-700 dark:text-white">
                            {{ $user->email }}
                        </h2>
                    </div>
                    <div class="relative w-32 h-32">
                        <div class="w-full h-full relative rounded-full border-4 shadow-sm">
                            <img class="w-full h-full object-cover rounded-full"
                                src="/storage/avatars/{{ $user->id }}" alt="Profile Picture">
                        </div>
                    </div>
                </div>

                @if (is_null($user->email_verified_at))
                    <div class="mt-6">
                        <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                            <span class="relative">Email not verified</span>
                        </span>
                    </div>
                @else
                    <div class="mt-6">
                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                            <span class="relative">Verified at {{ $user->email_verified_at }}</span>
                        </span>
                    </div>
                @endif

                <div class="mt-6">
                    @if (count($user->roles) > 0)
                        <h1 class="text-xl text-gray-600 dark:text-gray-200">Roles</h1>
                        @foreach ($user->roles as $role)
                            <span class="relative inline-block px-3 py-1 font-semibold text-gray-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-gray-200 opacity-50 rounded-full"></span>
                                <span class="relative">{{ $role->name }}</span>
                            </span>
                        @endforeach
                    @else
                        <h1 class="text-xl text-gray-600 dark:text-gray-200">User has no privileges</h1>
                    @endif

                </div>

                <div class="mt-6 text-center">
                    <a href="{{ url('/admin/users/' . $user->id . '/edit') }}"
                        class="block text-gray-300 bg-gray-800 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Edit
                    </a>
                </div>

                <form action="/admin/users/{{ $user->id }}" method="POST">
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
