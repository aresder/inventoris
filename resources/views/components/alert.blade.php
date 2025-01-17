 <div id="alert"
     class="flex gap-x-2 fixed top-0 right-0 z-50 @if ($theme === 'success') bg-blue-900/70 @elseif($theme === 'warning')bg-yellow-900/70 @else bg-red-900/70 @endif backdrop-blur-xl opacity-100 p-6 rounded-md m-5 text-white w-96 transition-all">
     <button id="alert-close"
         class="absolute mr-4 -mt-0.5 right-0 border border-white rounded-md py-1 px-2 text-xs">X</button>
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 -mt-0.5">
         @if ($theme === 'success')
             <path fill-rule="evenodd"
                 d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 0 1 .75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 0 1 9.75 22.5a.75.75 0 0 1-.75-.75v-4.131A15.838 15.838 0 0 1 6.382 15H2.25a.75.75 0 0 1-.75-.75 6.75 6.75 0 0 1 7.815-6.666ZM15 6.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z"
                 clip-rule="evenodd" />
             <path
                 d="M5.26 17.242a.75.75 0 1 0-.897-1.203 5.243 5.243 0 0 0-2.05 5.022.75.75 0 0 0 .625.627 5.243 5.243 0 0 0 5.022-2.051.75.75 0 1 0-1.202-.897 3.744 3.744 0 0 1-3.008 1.51c0-1.23.592-2.323 1.51-3.008Z" />
         @elseif ($theme === 'warning')
             <path fill-rule="evenodd"
                 d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                 clip-rule="evenodd" />
         @else
             <path fill-rule="evenodd"
                 d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                 clip-rule="evenodd" />
         @endif
     </svg>
     <span>{{ $slot }}</span>
     <div id="progressBarContainer"
         class="absolute bottom-0 left-0 z-50 @if ($theme === 'success') bg-blue-500 @elseif($theme === 'warning')bg-yellow-500 @else bg-red-500 @endif w-full h-2 opacity-0 rounded-md transition-opacity duration-1000">
         <div id="progressBar"
             class="@if ($theme === 'success') bg-blue-700 @elseif($theme === 'warning')bg-yellow-700 @else bg-red-700 @endif h-full w-0 rounded-md">
         </div>
     </div>


     <script>
         const alert = document.getElementById('alert')
         const close_button_alert = document.getElementById('alert-close')
         const alert_delay_close = 5000
         const alert_bar_close = 45
         const progressBarContainer = document.getElementById('progressBarContainer');
         const progressBar = document.getElementById('progressBar');

         progressBarContainer.classList.remove('opacity-0');
         progressBarContainer.classList.add('opacity-100');

         let progress = 0;
         const interval = setInterval(function() {
             if (progress < 100) {
                 progress += 1;
                 progressBar.style.width = progress + '%';
             } else {
                 clearInterval(interval);
             }
         }, alert_bar_close)

         close_button_alert.addEventListener('click', (ev) => {
             ev.preventDefault()
             alert.classList.remove('opacity-100');
             alert.classList.add('opacity-0');
         })

         setTimeout(function() {
             alert.classList.remove('opacity-100');
             alert.classList.add('opacity-0');
         }, alert_delay_close);

         setTimeout(function() {
             alert.remove()

         }, alert_delay_close + 500);
     </script>
 </div>
