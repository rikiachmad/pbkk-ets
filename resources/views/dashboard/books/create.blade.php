<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ "Tambah " . __($type === 'magazine' ? 'Majalah' : ucfirst($type)) }}
        </h2>
    </x-slot>

    <div class="p-12 pt-8">
        <div class="inline-flex">
            <x-partial.buttons.back-button :href="url()->previous()"></x-partial.buttons.back-button>
        </div>
        <div class="mt-5 md:mt-0">
            <form action="/dashboard/{{ $type }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="book_type" id="book_type" value="{{ $type }}">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-3 sm:p-6">
                        @if ($type === 'paper')
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3">
                                <div class="flex space-x-2">
                                    <label for="doi" class="block text-sm font-medium text-gray-700">
                                        Digital Object Identifier (DOI)
                                    </label>
                                    <p class="text-sm font-light text-gray-500">(Optional)</p>
                                </div>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="doi" id="doi"
                                        class="focus:ring-black-600 focus:border-black-600 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                        placeholder="10.1080/15588742.2015.1017687 " value="{{ old('doi') }}">
                                </div>
                            </div>
                        </div>
                        @elseif ($type === 'magazine')
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3">
                                <div class="flex space-x-2">
                                    <label for="issn" class="block text-sm font-medium text-gray-700">
                                        ISSN
                                    </label>
                                </div>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="issn" id="issn"
                                        class="focus:ring-black-600 focus:border-black-600 flex-1 block w-full rounded-md sm:text-sm  @error('issn') border-red-600 @else border-gray-300 @enderror"
                                        placeholder="2049-3630 " value="{{ old('issn') }}">
                                </div>
                                @error('issn')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @elseif ($type === 'textbook')
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3">
                                <div class="flex space-x-2">
                                    <label for="isbn" class="block text-sm font-medium text-gray-700">
                                        ISBN
                                    </label>
                                </div>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="isbn" id="isbn"
                                        class="focus:ring-black-600 focus:border-black-600 flex-1 block w-full rounded-md sm:text-sm @error('isbn') border-red-600 @else border-gray-300 @enderror "
                                        placeholder="978-3-16-148410-0" value="{{ old('isbn') }}">
                                </div>
                                @error('isbn')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Judul
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="name" id="name"
                                        class="focus:ring-black-600 focus:border-black-600 flex-1 block w-full rounded-md sm:text-sm @error('name') border-red-600 @else border-gray-300 @enderror "
                                        placeholder="Judul {{ $type === 'magazine' ? 'Majalah' : ucfirst($type) }}" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3">
                                <label for="slug" class="block text-sm font-medium text-gray-700">
                                    Slug
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="slug" id="slug"
                                        class="focus:ring-black-600 focus:border-black-600 bg-gray-100 flex-1 block w-full rounded-md sm:text-sm @error('slug') border-red-600 @else border-gray-300 @enderror "
                                        value="{{ old('slug') }}" readonly>
                                </div>
                                @error('slug')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @if ($type !== 'magazine')
                        <div class="grid grid-cols-4 gap-6">
                            <div class="col-span-2">
                                <label for="author" class="block text-sm font-medium text-gray-700">
                                    Penulis
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="author" id="author"
                                        class="focus:ring-black-600 focus:border-black-600 flex-1 block w-full rounded-md sm:text-sm @error('author') border-red-600 @else border-gray-300 @enderror"
                                        placeholder="Penulis" value="{{ old('author') }}">
                                </div>
                                @error('author')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label for="category" class="block text-sm font-medium text-gray-700">
                                    Kategori
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="category" id="category"
                                        class="focus:ring-black-600 focus:border-black-600 flex-1 block w-full rounded-md sm:text-sm @error('category') border-red-600 @else border-gray-300 @enderror"
                                        placeholder="Fisika, Pemrograman, ..." value="{{ old('category') }}">
                                </div>
                                @error('category')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <div class="grid grid-cols-3 gap-6">
                            <div class="{{ $type !== 'textbook' ? 'col-span-2' : 'col-span-1' }}">
                                <label for="publisher" class="block text-sm font-medium text-gray-700">
                                    Penerbit
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="publisher" id="publisher"
                                        class="focus:ring-black-600 focus:border-black-600 flex-1 block w-full rounded-md sm:text-sm @error('publisher') border-red-600 @else border-gray-300 @enderror"
                                        placeholder="Penerbit" value="{{ old('publisher') }}">
                                </div>
                                @error('publisher')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-span-1">
                                <label for="year_published" class="block text-sm font-medium text-gray-700">
                                    Tahun Terbit
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="number" min="1900" max="2021" name="year_published" id="year_published"
                                        class="focus:ring-black-600 focus:border-black-600 flex-1 block w-full rounded-md sm:text-sm @error('year_published') border-red-600 @else border-gray-300 @enderror"
                                        placeholder="Tahun Terbit" value="{{ old('year_published') }}">
                                </div>
                                @error('year_published')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @if ($type === 'textbook')
                            <div class="col-span-1">
                                <label for="edition" class="block text-sm font-medium text-gray-700">
                                    Edisi
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="number" name="edition" id="edition"
                                        class="focus:ring-black-600 focus:border-black-600 flex-1 block w-full rounded-md sm:text-sm @error('edition') border-red-600 @else border-gray-300 @enderror"
                                        placeholder="Edisi" value="{{ old('edition') }}">
                                </div>
                                @error('edition')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @endif
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">
                                Foto {{ $type === 'magazine' ? 'Majalah' : ucfirst($type) }}
                            </label>
                            <div class="p-1 max-w-sm">
                                <img class="img-preview" class="">
                            </div>
                            <input type="file" class="text-sm" onchange="previewImage()" id="image" name="image">
                            @error('image')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Deskripsi
                            </label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3"
                                    class="shadow-sm focus:ring-black-600 focus:border-black-600 mt-1 block w-full sm:text-sm border @error('description') border-red-600 @else border-gray-300 @enderror rounded-md"
                                    placeholder="Deskripsi">{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700 mb-1">
                                File {{ $type === 'magazine' ? 'Majalah' : ucfirst($type) }}
                            </label>
                            <input type="file" class="text-sm" id="file" name="file">
                            @error('file')
                                <div class="text-xs text-red-600 mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    const title = document.querySelector('#name');
    const slug = document.querySelector('#slug');


    title.addEventListener('change', () => {
        fetch('/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    function previewImage() {
      const image = document.querySelector('#image');
      const preview = document.querySelector('.img-preview');

      preview.style.display = 'block';
      
      const ofReader = new FileReader();
      ofReader.readAsDataURL(image.files[0]);
      ofReader.onload = function(oFREvent) {
        preview.src = oFREvent.target.result;
      }
    }
    </script>
</x-app-layout>