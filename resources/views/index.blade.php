<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/article.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
    <body>
    <div class="container">
        <header class="bs-docs-nav navbar navbar-static-top" id="top"></header>
    <div class ="row">
        <h4 class="title">{{$article->title}}</h4>
    </div>
    <p>{{$article->content}}</p>
    <footer>{{$article->update_at}}</footer>

    <div class="row" id="prepare-comment">
        <h5> Comments </h5>
        <a id ="create-comment" type="button" class="btn" data-parent_id = "0"> Add a public comment.... </a>
    </div>

    @include('comment', ['comments' => $article->comment, 'level' => 0])

    <form id="frm-comment">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="comment_id" id="comment_id" value="0" />
        <input type="hidden" name="article_id" id="article_id" value="{{ $article->id }}" />
        <div class="form-group">
            <label for="Name">Name:</label>
            <input class="form-control" name="name" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" name="comment" id="comment" placeholder="Please enter your comment" > </textarea>
        </div>
        <div>
            <button type="button" class="btn" id ="submit-comment">Publish</button>
        </div>

    </form>
    </div>
    <script src="{{ asset('js/comment.js') }}"></script>
    </body>
</html>