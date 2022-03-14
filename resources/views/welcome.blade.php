@push('styles')
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/bootstrap-4.6.1-dist/bootstrap.bundle.min.js') }}"></script>
@endpush

<x-layout title="a">
    @include('shared.navbar')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1>Album example</h1>
                <p class="lead text-muted">
                    Something short and leading about the collection below—its contents, the
                    creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it
                    entirely.
                </p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </section>

        <div class="grid grid-cols-4 gap-2">
            @for ($i = 0; $i < 9; $i++)
                <x-card class="p-8 flex-shrink-0"></x-card>
            @endfor
        </div>

    </main>

    @include('shared.footer')
</x-layout>
