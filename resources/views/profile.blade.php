<x-main-layout>
  @if (session()->has('success'))
  <div class="p-5" role="alert">
    <x-partial.alert type='success'>
      <x-slot name='text'>{{ session('success') }}</x-slot>
    </x-partial.alert>
  </div>
  @endif
  <div class="flex p-5 space-x-3 items-stretch">
    <div class="w-1/3 flex flex-col space-y-1">
      <div class="inline-flex space-x-2 text-2xl items-center">
        <i data-feather="user" class="text-black-600"></i>
        <p class="text-black-600 font-bold ">Profile</p>
      </div>
      <x-partial.cards.card class="rounded-md flex-1 flex-col px-4 pt-4 justify-between">
        <div class="flex flex-col items-center space-y-2 mt-4">
          <img src="{{ $user->image ?? 'https://source.unsplash.com/500x400?people' }}" alt=""
            class="rounded-full object-cover h-44 w-44">
          <p class="text-3xl text-black-600 m-2">{{ $user->name }}</p>
          <p class="text-xl m-1">{{ ucfirst($user->roles) }}</p>
        </div>
        <div class="block mt-5">
          @if (Auth::user() === $user)
          <div class="border-b-2 border-gray-200 rounded-md p-3 text-center">
            <a href="" class="text-gray-600 hover:text-black-600 transition">Settings</a>
          </div>
          <div class="p-3 text-center">
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="text-red-500 hover:text-red-600 transition">Logout</button>
            </form>
          </div>
          @endif
        </div>
      </x-partial.cards.card>
    </div>
    <div class="w-2/3 flex flex-col space-y-1">
      <div class="inline-flex space-x-2 text-2xl items-center">
        <i data-feather="book" class="text-black-600"></i>
        <p class="text-black-600 font-bold ">Latest Bookmark</p>
      </div>
      <x-partial.cards.card class="rounded-md h-screen flex-1">
        <ul class="flex border-b border-gray-100">
          <li class="flex-1 border-b {{ (request('type') === 'magazine') || (!request('type')) ? 'border-black-600' : 'border-transparent group hover:border-black-400 transition duration-300'}}">
            <a class="relative block p-4" href="?type=magazine">
              {{-- <span class="absolute inset-x-0 w-full h-px bg-black-600 -bottom-px"></span> --}}
              <div class="flex items-center justify-center">
                  <button type="submit" class="ml-3 text-sm font-medium {{ (request('type') === 'magazine') || (!request('type')) ? 'text-black-600' : 'text-gray-900 group-hover:text-black-400 transition duration-300' }}"> Majalah </button>
              </div>
            </a>
          </li>

          <li class="flex-1  border-b {{ (request('type') === 'textbook') ? 'border-black-600' : 'border-transparent group hover:border-black-400 transition duration-300'}}">
            <a class="relative block p-4" href="?type=textbook">
              <div class="flex items-center justify-center">
                <span class="ml-3 text-sm font-medium {{ (request('type') === 'textbook') ? 'text-black-600' : 'text-gray-900 group-hover:text-black-400 transition duration-300' }}">
                  Textbook </span>
              </div>
            </a>
          </li>

          <li class="flex-1 border-b {{ (request('type') === 'paper') ? 'border-black-600' : 'border-transparent group hover:border-black-400 transition duration-300'}}">
            <a class="relative block p-4" href="?type=paper">
              <div class="flex items-center justify-center">
                <span class="ml-3 text-sm font-medium {{ (request('type') === 'paper') ? 'text-black-600' : 'text-gray-900 group-hover:text-black-400 transition duration-300' }}">
                  Paper </span>
              </div>
            </a>
          </li>
        </ul>
        <div class="flex flex-col gap-2">
          @foreach ($bookmarks as $bookmark)
          <div class="flex w-full p-2 border-b shadow-sm">
            <div class="w-1/4">
              <img
                src="{{ $bookmark->book->image ? asset('uploads/' . $bookmark->book->image) : 'https://source.unsplash.com/500x400' }}"
                alt="" class="w-52 h-52 bg-cover">
            </div>
            <div class="flex flex-col justify-between px-2 pt-2 w-3/4">
              <div>
                <p class="font-bold text-xl text-black-600">{{ $bookmark->book->name }}</p>
                @if ($bookmark->book->book_type !== 'magazine')
                <p class="font-light text-base">{{ $bookmark->book->author }}</p>
                <x-partial.badge class="">{{ $bookmark->book->category }}</x-partial.badge>
                @else
                <p class="font-light text-base">{{ $bookmark->book->publisher }}</p>
                @endif
              </div>
              <div>
                <div class="flex justify-end text-gray-500">
                  Page {{ $bookmark->page }}
                </div>
                <div class="flex justify-between border-t pt-1">
                  <form action="/bookmark/{{ $bookmark->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-red-600 text-lg">Remove</button>
                  </form>
                  <a href="/bookmark/{{ $bookmark->id }}" class="text-black-600 text-lg">Continue Reading >></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <div class="p-2 pt-1">
            {{ $bookmarks->links() }}
          </div>
        </div>
      </x-partial.cards.card>
    </div>
  </div>
</x-main-layout>