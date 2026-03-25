<x-app-layout>

<div class="max-w-6xl mx-auto py-10 px-4">

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold">Uploaded Images</h1>

        <a href="{{ route('images.create') }}"
           class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">

            Upload Image
        </a>
    </div>

    @if($media->count())

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach($media as $image)

                <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-3">

                    <img 
                        src="{{ $image->original_url }}" 
                        class="w-full h-48 object-cover rounded-lg"
                        alt="{{ $image->file_name }}"
                    >

                    <div class="mt-3 text-sm text-gray-600">
                        <p class="truncate font-medium">{{ $image->file_name }}</p>
                        <p>{{ number_format($image->size / 1024, 1) }} KB</p>
                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="text-center py-20">
            <p class="text-gray-500 mb-6">No images uploaded yet.</p>

            <a href="{{ route('images.create') }}"
               class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                Upload your first image
            </a>
        </div>

    @endif

</div>

</x-app-layout>