@if(session('success') || session('error'))
   <div class="alert pt-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
               <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                     <div class="mt-5 md:mt-0 md:col-span-2">
                        @php $user = auth()->user(); @endphp
                        <div class="shadow overflow-hidden sm:rounded-md">
                           <div
                              class="{{ session('error') ? 'bg-red-400' : 'bg-green-400' }} alert-body px-4 py-5 sm:p-4 text-white">
                              <p>
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                      viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                 </svg>{{ __(session('error')) ?? __(session('success')) }}
                              </p>
                              <svg xmlns="http://www.w3.org/2000/svg" class="alert-dismiss-btn h-6 w-6" fill="none"
                                   viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                       d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                              </svg>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   @push('show-alert')
      <script>
          $('.alert-dismiss-btn').on('click', function () {
              console.log('clicked');
              $('.alert').remove();
          });
      </script>
   @endpush
@endif