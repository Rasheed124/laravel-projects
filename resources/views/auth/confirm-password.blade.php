   <x-auth-layout title="Confirm Password">

       <div class="max-w-sm mx-auto w-full px-4 py-8">

           <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6">Confirm Password</h1>
           <!-- Form -->
           <form>
               <div class="space-y-4">

                   <div>
                       <label class="block text-sm font-medium mb-1" for="password">Password</label>
                       <input id="password" class="form-input w-full" type="password" autocomplete="on" />
                   </div>
               </div>

           </form>
           <!-- Footer -->
           <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
               <div class="text-sm">
                   <button class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                       href="{{ route('register') }}">Sign Up</button>
               </div>

           </div>

       </div>

   </x-auth-layout>
