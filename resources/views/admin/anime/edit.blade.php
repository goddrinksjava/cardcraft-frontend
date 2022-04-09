@push('scripts')
    <script>
        console.log(imageUpload);

        function readURL() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.style.backgroundImage = `url(${e.target.result})`;
                }
                reader.readAsDataURL(this.files[0]);
            }
        }

        imageUpload.addEventListener("change", readURL, false);
    </script>
@endpush

<x-layout title="Edit User">
    <div class="bg-white dark:bg-gray-900 flex justify-center items-center min-h-screen">
        <div class="flex  px-8 lg:px-0 w-full lg:w-1/2">
            <div class="flex-1">
                <form action="/admin/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="flex flex-row justify-between items-center">
                        <div>
                            <h2 class="text-5xl font-bold text-gray-700 dark:text-white">
                                Edit User
                            </h2>
                        </div>
                        <div class="relative w-32 h-32">
                            <div class="absolute right-1 z-10 top-1">
                                <input class="hidden" type='file' id="imageUpload" name="imageUpload"
                                    accept=".png, .jpg, .jpeg" />
                                <label
                                    class="flex justify-center items-center w-8 h-8 mb-0 rounded-full bg-gray-200 shadow-sm cursor-pointer transition-all hover:bg-gray-300 border-gray-400"
                                    for="imageUpload">
                                    <img src="/svg/edit.svg" alt="edit" class="w-2/3 h-2/3">
                                </label>
                            </div>
                            <div class="w-full h-full relative rounded-full border-4 shadow-sm">
                                <div class="w-full h-full rounded-full bg-gray-200 bg-cover bg-no-repeat bg-center"
                                    id="imagePreview"
                                    style="background-image: url(../../../storage/avatars/{{ $user->id }});">
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-errors></x-errors>

                    <div class="mt-8">
                        <x-text-input name="email" type="email" placeholder="example@example.com" label="Email Address"
                            value="{{ $user->email }}" />
                        <x-text-input name="password" type="password" placeholder="Your Password" label="Password" />
                        <x-text-input name="confirmPassword" type="password" placeholder="Confirm Password"
                            label="Confirm Password" />

                        <div class="mt-6">
                            <x-checkbox name="verifiedEmail" label="Verified Email" :checked="!is_null($user->email_verified_at)" />
                        </div>

                        <fieldset class="mt-6">
                            <h1 class="text-xl text-gray-600 dark:text-gray-200">Roles</h1>
                            @foreach ($roles as $role)
                                <div class="text-gray-600 dark:text-gray-200">
                                    <x-checkbox name="roles[{{ $role->name }}]" :label="$role->name" :checked="$role->checked"
                                        value="{{ $role->name }}" id="role_{{ $role->name }}" />
                                </div>
                            @endforeach
                        </fieldset>

                        <div class="mt-6">
                            <button id="submitButton"
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
