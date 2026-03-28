<x-app-layout>
    <h1> Upload images</h1>

    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-xl mx-auto bg-white shadow-lg rounded-2xl p-8 space-y-6">

        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Upload Images
            </label>

            <input type="file" name="images[]" onchange="updateFileName(event)" multiple accept="image/*"
                class="block w-full text-sm text-gray-500
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-lg file:border-0
                   file:text-sm file:font-semibold
                   file:bg-blue-50 file:text-blue-700
                   hover:file:bg-blue-100
                   cursor-pointer border border-gray-200 rounded-lg p-2">
            @error('images')
                <span class="text-red-500  ">{{ $message }}</span>
            @enderror
            <p class="text-xs text-gray-400 mt-2">You can upload multiple images.</p>
        </div>

        <div>
            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2.5 px-4 rounded-lg
                   hover:bg-blue-700 transition duration-200 shadow-md">
                Upload Images
            </button>
        </div>

    </form>

    @push('scripts')
        <script>
            function updateFileName(event) {
                const files = event.target.files;
                cont spanfileName = document.getElementById('file-name');

                if (files.length == 0) {
                    spanfileName.textContent = "No file choosen";
                } else if (files.length === 1) {
                    spanfileName.textContent = file[0].name;

                } else {
                    spanfileName.textContent = `${files.length} files choosen`;;

                }

            }
        </script>
    @endpush
</x-app-layout>
