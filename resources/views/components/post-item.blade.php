     <div class="bg-white p-6 rounded-2xl shadow mb-6">
         <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>

         <x-post-meta :post="$post" />

         <p class="text-gray-700 mb-4">
             {{ $post->title }}
         </p>

          <x-post-tag :post="$post" />

         <a href="/posts/{{ $post->slug }}" class="text-blue-600 font-medium hover:underline">
             Read more →
         </a>
     </div>
