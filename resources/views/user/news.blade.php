<a class="text-decoration-none w-100" href="/home/posts/{{ $latest_post->id }}"> 
  <div class="card text-white gap-lg-3 gap-0 mx-auto"  id="news">
    <div class="gradient"></div>
    @if ($latest_post != null)
      <h5 class="card-title text-center border-bottom border-2">{{$latest_post -> judul_berita}}</h5>
    @else
    <h5 class="card-title text-center border-bottom border-2">No Title</h5>
    @endif
    <div class="description">
      @if ($latest_post != null)
        <p class="card-text">{!! Str::limit(htmlspecialchars_decode(strip_tags($latest_post -> konten)), 200) !!}</p>  
      @else
        <p class="card-text text-center ">No Content</p>  
      @endif
    </div> 
  </div>
</a>