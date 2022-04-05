<div role="alert" class="relative p-6 text-white rounded-lg bg-gradient-to-b @switch($type)
    @case('success')
        from-green-600 to-green-700
        @break

    @case('danger')
        from-red-600 to-red-700
        @break

    @default
        
@endswitch">
  <button type="button" class="absolute top-3 right-3 close-alert">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>

  @switch($type)
    @case('success')
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-8 h-8">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
      </svg>
      @break
    @case('danger')
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-8 h-8">
        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
      </svg>
        @break
  
    @default
      
  @endswitch

  

  <div class="max-w-xs mt-4">
    <p class="font-bold">{{ $title ?? ucfirst($type) }}</p>

    <p class="mt-1 text-sm text-green-200">
      {{ $text ?? '' }}
    </p>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
	integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
	</script>
  <script>
    $(".close-alert").click(function (e) {
        // $('.alertbox')[0].hide()
        // e.preventDefault();
        pid = $(this).parent().parent().hide(500)
        console.log(pid)
        // $(".alertbox", this).hide()
    })
    </script>
</div>
