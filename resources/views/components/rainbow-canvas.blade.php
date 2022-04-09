@php($id = 'cnvs_' . uniqid())

<canvas id="{{ $id }}" {{ $attributes }}></canvas>

@push('styles')
    <style>
        #{{ $id }} {
            mask: url({{ $mask }}) center / 100% 100% no-repeat;
            -webkit-mask: url({{ $mask }}) center / 100% 100% no-repeat;
        }

    </style>
@endpush

@push('scripts')
    <script>
        const canvas = document.getElementById("{{ $id }}");;

        const ctx = canvas.getContext("2d");
        let frame = requestAnimationFrame(loop);

        function loop(t) {
            frame = requestAnimationFrame(loop);

            const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);

            for (let i = 0; i < imageData.data.length; i++) {
                const x = i % canvas.width;
                const y = (i / canvas.width) >>> 0;

                const r = 64 + (128 * x) / canvas.width + 64 * Math.sin(t / 1000);
                const g = 64 + (128 * y) / canvas.height + 64 * Math.cos(t / 1000);
                const b = 128;

                const i4 = i * 4;
                imageData.data[0 + i4] = r;
                imageData.data[1 + i4] = g;
                imageData.data[2 + i4] = b;
                imageData.data[3 + i4] = 255;
            }

            ctx.putImageData(imageData, 0, 0);
        }
    </script>
@endpush
