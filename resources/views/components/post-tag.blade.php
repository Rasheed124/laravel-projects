  <div class="flex flex-wrap gap-2 mb-4">
      @foreach ($post->tags as $tag)
          <a href="/tags/{{ $tag }}"> <span
                  class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs">{{ $tag }}</span> </a>
      @endforeach
  </div>
