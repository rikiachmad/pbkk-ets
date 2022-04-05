<x-app-layout>
    <x-slot name="header">
        <div class="inline-flex justify-between w-full items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Katalog') }}
            </h2>
            <button
                class="modal-open transition bg-transparent border border-gray-500 hover:bg-blue-600 text-gray-500 hover:text-white font-semibold py-1 px-3 rounded-md">Add
                Book</button>
        </div>
    </x-slot>
    
    <x-partial.modal>
        <x-slot name='header'>Pilih tipe buku</x-slot>
        <form action="{{ route('dashboard.books.create') }}" method="GET">
            <!--Body-->
            <div class="block">
                <select name="type" id="book_type"
                    class="text-sm text-gray-500 border-gray-200 rounded-lg w-full transition duration-300 ease-in-out" required>
                    <option value="" disabled hidden {{ old('book_type')=='' ? 'selected' : '' }}>Jenis Buku
                    </option>
                    <option value="magazine" {{ old('book_type')=='magazine' ? 'selected' : '' }}>Majalah
                    </option>
                    <option value="paper" {{ old('book_type')=='paper' ? 'selected' : '' }}>Paper</option>
                    <option value="textbook" {{ old('book_type')=='textbook' ? 'selected' : '' }}>Textbook
                    </option>
                </select>
                
                <div class="flex justify-end pt-2">
                    <button class="px-4 bg-blue-600 p-2 rounded-lg text-white hover:bg-blue-700">Tambah</button>
                </div>
            </div>
        </form>
    </x-partial.modal>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('success'))
            <div class="mb-4" role="alert">
                <x-partial.alert type='success'>
                    <x-slot name='text'>{{ session('success') }}</x-slot>
                </x-partial.alert>
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="table-auto min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nama
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Tipe Buku
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Author
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Kategori
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Action
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($books as $book)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ ($books->currentpage() - 1) *
                                                    $books->perpage() + $loop->index + 1 }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ Str::limit($book->name, 40, '...') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ ucfirst($book->book_type) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $book->author }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if (empty($book->category))
                                                    <div class="text-center">-</div>
                                                    @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $book->category }}
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap ">
                                                    <div class="inline-flex items-center divide-x">
                                                        <a href="/books/{{ $book->slug }}"
                                                            class="px-2 text-blue-700"><i data-feather="eye"></i></a>
                                                        <a href="/dashboard/books/{{ $book->slug }}/edit"
                                                            class="px-2 text-yellow-500"><span
                                                                data-feather="edit"></span></a>
                                                        <form action="/dashboard/books/{{ $book->slug }}" method="POST"
                                                            class="px-2 text-red-600 flex items-center">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class=""
                                                                onclick="return confirm('Are you sure?')"><span
                                                                    data-feather="x-circle"></span></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                            <!-- More people... -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="my-3">
                                    {{ $books->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>