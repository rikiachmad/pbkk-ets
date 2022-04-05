<x-main-layout>
  <section class="bg-gray-100">
    @if (session()->has('success'))
    <div class="mx-auto mt-4 px-8" role="alert">
      <x-partial.alert type='success'>
        <x-slot name='text'>{{ session('success') }}</x-slot>
      </x-partial.alert>
    </div>
    @endif
    <div class="px-4 py-16 mx-auto max-w-screen-xl sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
        <div class="lg:py-12 lg:col-span-2">
          <p class="max-w-xl text-lg">
            Apabila buku/sumber referensi yang dibutuhkan belum ada, Anda dapat membantu kami menambah koleksi kami
            dengan mengisi Form Request ini. Kami akan segera mencarikan buku yang Anda butuhkan.
          </p>
        </div>

        <div class="p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3">
          <form action="/contact" method="POST" class="space-y-4">
            @csrf
            <div class="block">
              <select name="type" id="inquiry_type"
                class="text-sm text-gray-500 border-gray-200 rounded-lg w-full transition duration-300 ease-in-out">
                <option value="" disabled hidden {{ old('inquiry_type')=='' ? 'selected' : '' }}>Jenis Keluhan</option>
                <option value="complaint" {{ old('inquiry_type')=='complaint' ? 'selected' : '' }}>Ajuan</option>
                <option value="request" {{ old('inquiry_type')=='request' ? 'selected' : '' }}>Permintaan</option>
              </select>
            </div>

            <div>
              <label class="sr-only" for="message">Pesan</label>
              <textarea class="w-full p-3 text-sm border-gray-200 rounded-lg transition duration-300 ease-in-out"
                placeholder="Pesan" rows="8" id="message" name="text"
                style="min-height: 4rem; max-height: 20rem">{{ old('text') }}</textarea>
            </div>

            <div class="mt-4 flex justify-end">
              <button style="background-color: black" type="submit"
                class="inline-flex items-center justify-center w-full px-5 py-3 text-white rounded-lg sm:w-auto">
                <span class="font-medium"> Submit </span>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-3" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-main-layout>