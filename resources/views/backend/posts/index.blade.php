<h1>Posts werkt</h1>

<ul>
    @foreach($posts as $post)

        <li>
            <strong>{{$post->title}} - <small>{{$post->user->name}} - {{$post->user->created_at->diffForHumans()}}</small></strong><br>
            <em>{{$post->description}}</em>

        </li>
    @endforeach
</ul>
