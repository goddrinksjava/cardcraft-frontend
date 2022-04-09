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

<x-layout title="Create User">
    <div class="bg-white dark:bg-gray-900 flex justify-center min-h-screen">


        <div class="flex items-center px-8 lg:px-0 w-full lg:w-1/2">

            <div class="flex-1">

                <form action="/admin/anime" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-row justify-between flex-wrap items-center">
                        <div>
                            <h2 class="text-5xl font-bold text-gray-700 dark:text-white">
                                Create Anime
                            </h2>
                        </div>
                        <div class="relative w-[200px] h-[300px]">
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
                        <x-text-input name="title" placeholder="Anime Title" label="Title" />
                        <x-textarea name="synopsis" placeholder="What this anime is about" label="Synopsis" />
                        <x-date-input name="release_date" label="Release Date" />

                        <fieldset class="mt-6">
                            <h1 class="text-xl text-gray-600 dark:text-gray-200">Genres</h1>
                            @foreach ($genres as $genre)
                                <div>
                                    <x-checkbox name="genres[{{ $genre }}]" :label="$genre"
                                        value="{{ $genre }}" id="genre_{{ $genre }}" />
                                </div>
                            @endforeach
                        </fieldset>


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
