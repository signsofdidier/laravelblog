<li class="single_comment_area mb-3">
    <div class="comment-wrapper d-md-flex align-items-start" style="margin-bottom:50px">
        <!-- Comment Meta -->
        <div class="comment-author me-3">
            <img class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover"
                 src="{{ $comment->user->photo->path ?? 'default-avatar.png' }}"
                 alt="{{ $comment->user->name }}">
        </div>

        <!-- Comment Content -->
        <div class="comment-content bg-light p-3 rounded flex-grow-1">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">{{ $comment->user->name }}</h5>
                <span class="comment-date font-pt text-muted small">{{ $comment->created_at->diffForHumans() }}</span>
            </div>

            <!-- comment tekst -->
            <div class="my-2">
                @if ($comment->parent)
                    <p class="mb-4 mt-0 text-dark"><strong class="text-primary" style="font-size:12px">Comment on {{ $comment->parent->user->name }}: <br> </strong> {{ $comment->body }}</p>
                @else
                    <p class="mb-4 text-xl text-dark">{{ $comment->body }}</p>
                @endif
            </div>

            <!-- accordion voor de reply  -->
            <div>
                <button class="btn btn-sm btn-outline-primary"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{ $comment->id }}">
                    <i class="fa fa-reply"></i>
                    @if ($comment->parent)
                        Reply to {{ $comment->parent->user->name }}
                    @else
                        Reply
                    @endif
                </button>

                <div class="collapse mt-3" id="collapse-{{ $comment->id }}">
                    <div class="card card-body border-0">
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            <div class="form-group">
                                <textarea class="form-control" name="body" rows="3"
                                          placeholder="Reply to this comment" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mt-2">Reply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Diepte laag voor de children weer te geven -->
    @if ($comment->children->count() > 0)
        <ol class="children ms-5 mt-3">
            @foreach($comment->children as $child)
                <x-frontend.comment.comment :comment="$child" />
            @endforeach
        </ol>
    @endif
</li>


