<section class="gazette-post-discussion-area section_padding_100 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <!-- Comment Area Start -->
                <div class="comment_area section_padding_50 clearfix">
                    <div class="gazette-heading">
                        <h4 class="font-bold">Discussion</h4>
                    </div>
                    <ol>
                        @foreach($post->comments->where('parent_id', null) as $comment)
                            <!-- Single Comment Area -->
                            <x-frontend.comment :comment="$comment" />
                        @endforeach
                    </ol>
                </div>

                @auth
                    @php
                        $currentUser = Auth::user();
                    @endphp
                    @if($currentUser)
                        <!-- Leave A Comment -->
                        <div class="leave-comment-area clearfix">
                            <div class="comment-form">
                                <div class="gazette-heading">
                                    <h4 class="font-bold">Leave a comment</h4>
                                </div>
                                <!-- Comment Form -->
                                <form action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="form-group">
                                        <input type="text" class="form-control" disabled value="Username: {{ $currentUser->name }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Comment" required></textarea>
                                    </div>
                                    <button type="submit" class="btn leave-comment-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endauth

                @guest
                    <!-- Leave A Comment for Guests -->
                    <div class="leave-comment-area clearfix">
                        <div class="comment-form">
                            <div class="gazette-heading">
                                <h4 class="font-bold">leave a comment</h4>
                            </div>
                            <p>Je moet ingelogd zijn om een reactie achter te laten.</p>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</section>



