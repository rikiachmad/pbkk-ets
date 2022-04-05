<x-main-layout>
    <section class="flex flex-col p-5 space-y-2">
        <div class="px-1">
            <h1 class="font-bold text-3xl text-black-900">Katalog</h1>
        </div>
        <div class="flex p-1 space-x-2">
            <x-partial.cards.card class="lg:w-1/6 p-4">
                <h2 class="text-lg">Kategori</h2>
                <form action="" class="">
                    @if (request('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif
                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    <div class="p-4 space-y-2">
                        <div class="flex items-center">
                            <input type="checkbox" name="book_type[]" id="textbook" class="border-gray-300 w-6 h-6" 
                            value="textbook" {{ (is_array(request('book_type')) && in_array("textbook", request('book_type'))) ? ' checked' : '' }}>
                            <label for="textbook" class="ml-3 text-sm font-medium">Textbook</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="book_type[]" id="majalah" class="border-gray-300 w-6 h-6" 
                            value="magazine" {{ (is_array(request('book_type')) && in_array("magazine", request('book_type'))) ? ' checked' : '' }} >
                            <label for="majalah" class="ml-3 text-sm font-medium">Majalah</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="book_type[]" id="paper" class="border-gray-300 w-6 h-6" 
                            value="paper" {{ (is_array(request('book_type')) && in_array("paper", request('book_type'))) ? ' checked' : '' }}>
                            <label for="paper" class="ml-3 text-sm font-medium">Paper</label>
                        </div>
                    </div>
                    <button style="background-color: black" type="submit" class="w-full bg-blue-700 p-2 text-xs font-medium text-white rounded-md">Apply Filter</button>
                </form>
            </x-partial.cards.card>
            <div class="space-y-1 lg:w-5/6 px-1">
                <x-partial.forms.search action='/books' class="h-1/3 max-h-12">
                @if (request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif
                @if (request('book_type'))
                            @foreach (request('book_type') as $type)
                                <input type="hidden" name="book_type[]" value="{{ $type }}">
                            @endforeach
                        @endif
                </x-partial.forms.search>
                <div class="flex justify-end ">
                    {{-- <span class="text-xs text-gray-600 self-end">Showing 10 of 30 entries</span> --}}
                    <form action="" method="get">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        @if (request('book_type'))
                            @foreach (request('book_type') as $type)
                                <input type="hidden" name="book_type[]" value="{{ $type }}">
                            @endforeach
                        @endif
                        <label for="sort" class="sr-only">Sort</label>
                        <select name="sort" id="sort" class="text-sm border-gray-200 rounded-sm" onchange="if(this.value != '') { this.form.submit(); }">
                            <option value="" disabled hidden {{ request('sort') == '' ? 'selected' : ''}}>Sort by</option>
                            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : ''}}>Oldest</option>
                            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : ''}}>Newest</option>
                        </select>
                    </form>
                </div>
                <div class="grid grid-cols-3 grid-rows-3 gap-2 py-1">
                    @foreach ($books as $book)
                    <x-partial.cards.book-card :bookType="$book->book_type" :link='$book->slug' :image='$book->image'>
                        <x-slot name='title'>
                            {{ $book->name }}
                        </x-slot>
                        <x-slot name='category'>
                            {{ $book->book_type !== 'magazine' ? $book->category : 'null' }}
                        </x-slot>
                        <x-slot name='author'>
                            {{ $book->book_type !== 'magazine' ? $book->author : $book->publisher }}
                        </x-slot>
                        <x-slot name='timestamp'>
                            Added {{ $book->created_at->diffForHumans() }}
                        </x-slot>
                    </x-partial.cards.book-card>
                    @endforeach
                </div>
                {{ $books->links() }}
            </div>
        </div>
    </section>
</x-main-layout>