<section class="gazatte-editorial-area section_padding_100 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="editorial-post-slides owl-carousel">

                    @foreach($category->posts->shuffle()->take(4) as $post))
                        <!-- Editorial Post Single Slide -->
                        <div class="editorial-post-single-slide">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="editorial-post-thumb">
                                        @if($post->photo)
                                            <img style="height: 400px; width: 100%; object-fit: cover" src="{{ asset('assets/img/' . $post->photo->path) }}" alt="">
                                        @else
                                            <img style="height: 400px; width: 100%; object-fit: cover"  src="http://placehold.co/400x400" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="editorial-post-content">
                                        <!-- Post Tag -->
                                        <div class="gazette-post-tag">
                                            @foreach($post->categories as $postCategory)
                                                <a href="#">{{ $postCategory->name }}</a>
                                            @endforeach
                                        </div>
                                        <h2><a href="#" class="font-pt mb-15">{{ $post->title }}</a></h2>
                                        <p class="editorial-post-date mb-15">{{ $post->created_at->format('M d, Y') }}</p>
                                        <p>{{ Str::limit($post->content, 500) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
