<form action="{{ $action }}" {{ $attributes->merge(['class' => "flex space-x-3 items-stretch"]) }}>
    <input name="search" value="{{ request('search') }}" type="text" id="search" placeholder="Search Book" class="rounded-lg w-full">
    {{ $slot }}
    <button type="submit"
        class="text-blue-900 bg-white rounded-md px-2 inline-flex justify-center items-center border border-white hover:bg-blue-900 hover:text-white transition duration-300"><i
            data-feather="search"></i></button>
</form>