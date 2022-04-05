<a href="{{'/books/' . $link }}" class="flex flex-col justify-between bg-white border border-black-100 rounded group">
  <div class="border-b p-2 flex justify-between">
    <div>
      <p class="text-sm font-bold text-black-600" >{{ ucfirst($bookType) }}</p>
    </div>
    @if ($bookType !== 'magazine')
        <x-partial.badge class="self-center">{{ $category }}</x-partial.badge>
    @endif
  </div>
  
  <div class="px-1">
    <img
    src="{{ $image ? asset('uploads/' . $image ): 'https://images.unsplash.com/photo-1545289414-1c3cb1c06238?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80' }}"
    alt="" class="object-cover w-full h-18" />
  </div>

  <div class="flex flex-col justify-between px-8 pb-8">
    <div class="flex justify-between space-x-2">
      <p class="text-lg font-bold break-all">{{ $title }}</p>
    </div>
    <p class="text-sm text-black-600">{{ $author }}</p>



    <div class="pt-4 mt-4 border-t border-black-100 flex justify-between">
      <div class="self-end">
        <p class="text-black-400 text-xs">{{ $timestamp }}</p>
      </div>
      <span style="background-color: black" class="inline-block px-5 py-3 text-xs font-bold text-white bg-black-600 rounded group-hover:opacity-75">
        Details
      </span>
    </div>

  </div>
</a>