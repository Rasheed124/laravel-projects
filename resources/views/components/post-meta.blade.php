  <p class="text-sm text-gray-500 mb-4">
      By <a href="/author/{{ $post->author }}">{{ $post->author_name }}</a> •
      {{ \Carbon\Carbon::parse($post->date)->diffForHumans() }}
  </p>
