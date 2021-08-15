<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Sozlamalar') }}
      </h2>
   </x-slot>

   <x-dashboard.alerts/>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
               <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                     <div class="mt-5 md:mt-0 md:col-span-2">
                        @php $user = auth()->user(); @endphp
                        <form action="{{ route('settings.update', $user->id) }}" method="POST">
                           @method('PUT')
                           @csrf
                           <div class="shadow overflow-hidden sm:rounded-md">
                              <div class="px-4 py-5 bg-white sm:p-6">
                                 <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                       <label for="name"
                                              class="block text-sm font-medium text-gray-700">Ismingiz</label>
                                       <input name="name" value="{{ old('name') ?? $user->name }}" id="name" type="text"
                                              class="@error('name') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                       @error('name')
                                       <span
                                          class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                          {{ $message }}
                                       </span>
                                       @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                       <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                       <input name="email" value="{{ old('email') ?? $user->email }}" id="email"
                                              type="text"
                                              class="@error('email') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                       @error('email')
                                       <span
                                          class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                          {{ $message }}
                                       </span>
                                       @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                       <label for="password" class="block text-sm font-medium text-gray-700">Yangi
                                          parol</label>
                                       <input name="password" id="password" type="password" autocomplete="false"
                                              class="@error('password') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                       @error('password')
                                       <span
                                          class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                          {{ $message }}
                                       </span>
                                       @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                       <label for="password_confirmation"
                                              class="block text-sm font-medium text-gray-700">Yangi parolni
                                          takrorlang</label>
                                       <input name="password_confirmation" id="password_confirmation" type="password"
                                              autocomplete="false"
                                              class="@error('password_confirmation') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                       @error('password_confirmation')
                                       <span
                                          class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                          {{ $message }}
                                       </span>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                 <button type="submit"
                                         class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Yangilash
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
