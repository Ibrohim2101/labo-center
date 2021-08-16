<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Qoldirilgan Arizalar') }}
      </h2>
   </x-slot>

   <x-dashboard.alerts/>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
               <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                     <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-500">
                        <tr>
                           <th scope="col"
                               class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">
                              Ism, Familya
                           </th>
                           <th scope="col"
                               class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">
                              Telefon raqam
                           </th>
                           <th scope="col"
                               class="px-6 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">
                              Xabar
                           </th>
                           <th scope="col"
                               class="px-6 py-3 text-left text-sm font-bold text-white uppercase">
                              Qabul qilingan sana
                           </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($applications as $application)
                           <tr>
                              <td class="px-6 py-4 whitespace-nowrap">
                                 {{ $application->name }}
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">
                                 {{ $application->phone }}
                              </td>
                              <td class="px-6 py-4">
                                 {{ $application->message }}
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm">
                                 {{ $application->created_at }}
                              </td>
                           </tr>
                        @endforeach
                        </tbody>
                     </table>
                  </div>

                  {{ $applications->links() }}
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
