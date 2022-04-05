<x-main-layout>
  <section>
    <div class="grid grid-cols-1 lg:grid-cols-2 lg:h-2/4">
      <div class="relative flex items-center lg:pl-4" style="background-color: black">

        <div class="relative px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
          <h2 class="text-2xl font-bold text-white sm:text-3xl">Welcome to RZ Online Bookshelf</h2>

          <p class="mt-4 text-white">
            RZ Online Bookshelf is a online books library which contains multiple type of books such as regular books, magazines, and research papers. 
          </p>

          <x-partial.forms.search action='/books' class="mt-6 w-2/3"/>
        </div>


      </div>
      <div class="relative z-10 lg:py-8">
        <div class="relative h-64 lg:h-full">
          <img class="absolute inset-0 object-cover w-full h-full" src="{{ asset('assets/bg-1.jpg') }}" alt="" />
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="flex justify-between items-center p-2 space-x-">
      <div class="p-2 flex-1">
        <x-partial.cards.top-border-card logo="book.png" href='/books' >
          Buku
        </x-partial.cards.top-border-card>
      </div>
      <div class="p-2 flex-1">
        <x-partial.cards.top-border-card logo="magz.png" href='/books'>
          Majalah
        </x-partial.cards.top-border-card>
      </div>
      <div class="p-2 flex-1">
        <x-partial.cards.top-border-card logo="paper.png" href='/books'>
          Research Paper
        </x-partial.cards.top-border-card>
      </div>
    </div>
  </section>
</x-main-layout>