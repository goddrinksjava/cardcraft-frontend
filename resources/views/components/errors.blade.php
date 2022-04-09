@props(['title'])

@if ($errors->any())
    <div role="alert" class="mt-4">
        <div class="bg-rose-800 text-white font-bold rounded-t px-4 py-2">
            {{ $title ?? 'Errors' }}
        </div>
        <div class="border border-t-0 border-rose-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif
