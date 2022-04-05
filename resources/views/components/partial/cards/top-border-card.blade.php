<a {{ $attributes->merge(['class' => 'relative flex justify-center p-8 pb-24 border-t-4 border-black-900 rounded-sm shadow-xl h-56', 'href' => '']) }}>

  <div class="flex justify-evenly items-center w-full">
    <img src="{{ asset('assets/' . $logo) }}" alt="" class="">
    <p class="text-lg font-medium text-gray-500">
      {{ $slot }}
    </p>
  </div>

  <span class="absolute bottom-8 right-8">
    <i data-feather="arrow-right" class="text-black-900"></i>
  </span>
</a>