  <!-- Post Card -->
  @foreach ($posts as $post)
      <x-post-item :post="$post" />
  @endforeach
