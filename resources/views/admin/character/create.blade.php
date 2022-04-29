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

<x-layout title="Create Character">
    <div class="bg-white dark:bg-gray-900 flex justify-center min-h-screen">


        <div class="flex items-center px-8 lg:px-0 w-full lg:w-1/2">

            <div class="flex-1">

                <form action="/admin/characters" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-row justify-between flex-wrap items-center">
                        <div>
                            <h2 class="text-5xl font-bold text-gray-700 dark:text-white">
                                Create Character
                            </h2>
                        </div>
                        <div class="relative w-[200px] h-[200px]">
                            <div class="absolute right-1 z-10 top-1">
                                <input class="hidden" type='file' id="imageUpload" name="imageUpload"
                                    accept=".png, .jpg, .jpeg" />
                                <label
                                    class="flex justify-center items-center w-8 h-8 mb-0 rounded-full bg-gray-200 shadow-sm cursor-pointer transition-all hover:bg-gray-300 border-gray-400"
                                    for="imageUpload">
                                    <img src="/svg/edit.svg" alt="edit" class="w-2/3 h-2/3">
                                </label>
                            </div>

                            <div class="w-full h-full bg-gray-50 bg-cover border bg-no-repeat bg-center"
                                id="imagePreview">
                            </div>
                        </div>
                    </div>

                    <x-errors></x-errors>

                    <div class="mt-8">
                        <x-text-input name="name" placeholder="Character Name" label="Name" />
                        <x-textarea name="description" placeholder="What this character is like" label="Description" />

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
