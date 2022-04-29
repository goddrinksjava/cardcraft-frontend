@push('scripts')
    <script>
        const rows = document.getElementsByClassName('userRow');

        console.log(rows)

        for (const row of rows) {
            const id = row.id.split(':')[1];
            row.addEventListener("click", () => {
                window.location.href = `/admin/reviews/${id}`;
            });
        }
    </script>
@endpush

<x-layout title="Review">
    @include('shared.navbar')

    <div class="bg-white p-8 rounded-md w-full">
        <div class="flex items-center justify-between pb-6">
            <div class="flex items-center">
                <h2 class="text-xl text-gray-600 font-semibold pr-2">Review</h2>
                <a href="/admin/reviews/create">
                    <img class="h-5 w-5" src="/svg/add.svg" alt="Create new user">
                </a>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex bg-gray-50 items-center p-2 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                    <input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id="" placeholder="search...">
                </div>
            </div>
        </div>
        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded overflow-hidden">
                    <table class="min-w-full leading-normal">

                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    User ID
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Anime ID
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Comment
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Score
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Date
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($reviews as $review)
                                <tr class="userRow transition hover:bg-slate-50 cursor-pointer"
                                    id="reviewId:{{ $review->id }}">

                                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $review->user->id }}</p>
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $review->anime->id }}</p>
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{!! nl2br($review->comment) !!}</p>
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $review->score }}</p>
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $review->updated_at }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</x-layout>
