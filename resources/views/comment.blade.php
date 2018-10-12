<div id="replies-list">
@foreach($comments as $comment)
    <?php ?>

     <div data-level="{{ $level }}" class="level-{{ $level }}" id="comment-id-{{ $comment->id }}">
         <blockquote>
        <p class="comment-text">{{ $comment->content }}</p>
             <footer>Posted by: {{ $comment->username }}   edited: {{ $comment->created_at }}</footer>
             @if($level < 2)
                 <a data-parent_id="{{ $comment->id }}" type="button" class="btn">Add a public reply... </a>
         @endif

         </blockquote>
    </div>


    @if($comment->replies->count())
        @include('comment', ['comments' => $comment->replies, 'level' => $level+1])
    @endif

@endforeach
</div>