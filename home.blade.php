@extends('layouts.app')
@section('style')
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--style-->
    <link rel="stylesheet" href="css/style.css">
@endsection 

@section('content')


<!--start nav bar-->
{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand btn brand" href="{{url('index')}}">Social Media</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText" style="flex-grow: 0;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{url('/login')}}">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link asignUp" href="{{url('/register')}}">SIGNUP</a>
          </li>
        </ul>
      <!--if login-->
         <div class="flexPostForm">
            <div class="imgPostForm imgHead" >
                <img src="img/man.jpg" alt="">
            </div>
            <div class="namePostCard">
                <p class="name">Omar Khaled</p>
            </div>   
        </div> 
    </div>
    </div>
</nav>
<!--end nav bar--> --}}

<!--start content-->
    @if (\Session::has('success'))
        <div class="alert alert-success text-center" role="alert" style="text-align: right;">
            Your post has been Posted

            {{-- <button type="button" class="close" data-dismiss="alert">X</button> --}}
        </div>      
    @endif
    @if (\Session::has('deleted'))
        <div class="alert alert-danger text-center" role="alert" style="text-align: right;">
            Your post has been deleted successfully

            {{-- <button type="button" class="close" data-dismiss="alert">X</button> --}}
        </div>      
    @endif
    
    
<div class="container ">
    <div class="postForm container" >
       <div class="flexPostForm ">
        {{-- <div class="imgPostForm">
            <img src="img/man.jpg" alt="">
        </div> --}}
        <input data-bs-toggle="modal" data-bs-target="#exampleModal" class="form-control" type="text" placeholder="Type Your Post Here" aria-label=".form-control-lg example">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Type your post here...
                        <form method="post" action="{{route('posts.create')}}" enctype="multipart/form-data">
                            @csrf
                            @foreach ($users as $users )
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            @endforeach    
                        <textarea class="form-control txtPostModal" id="exampleFormControlTextarea1" rows="3" name="caption" required></textarea>
                        <input class="form-control" type="file" id="formFile" name="userfile">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
                </div>
            </div>
        </form>

       </div>     
    </div>
    
    @foreach ($posts as $posts )
        <?php $userPost= App\Models\User::find($posts->user_id);?>

            <div class="postCard container">
                <div class="postForm">
                    <div class="flexPostForm">
                        {{-- <div class="imgPostForm">
                            <img src="img/man.jpg" alt="">
                        </div> --}}
                        <div class="namePostCard row w-100">
                            <h5 class="name col-11"><a href="{{route('show.users',$userPost->id.'-'.$userPost->name)}}" style="text-decoration: none;">{{$userPost->name}}</a></h5>
                            @if($posts->user_id == Auth::user()->id)
                            <div class="delete col-1 ">
                                    <form id="delete-post" action="{{ route('posts.destroy',$posts->id)}}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="fa-sharp fa-solid fa-trash" title="Delete post"></i>
                                        </button>
                                    </form>
                            </div>
                            @endif
                            <div class="divTime">
                                <i class="fa-solid fa-clock" style="margin-bottom :15px">
                                    <span>{{$posts->created_at->setTimezone('Asia/Gaza')->diffForHumans()}}</span>
                                </i>
                            </div>
                        </div>   
                    </div> 
                    <div class="imgPost">
                        <h6>{{$posts->caption;}}</h6> 
                    {{-- <img src="img/business.jpg" class="img-fluid rounded" alt="..."> --}}

                        @if ($posts->image !== '')
                            <div class="text-center">
                                <img src="{{asset('userFiles/'.$posts->image)}}" class="rounded img-fluid">
                            </div>    
                        @else
                        @endif
                    </div>
                    <div class="divNumComments">
                        <?php $commentsCount = App\Models\Comments::where('post_id', '=', $posts->id)->count()?>
                        <a class="pNumComments" data-bs-toggle="collapse" href="#post{{$posts->id}}" role="button" aria-expanded="false" aria-controls="collapseExample" >{{$commentsCount}} Comments</a>
                    </div>
                    <div>
                        <div class="flexPostForm" id="post">
                            {{-- <div class="imgPostForm">
                                <img src="img/man.jpg" alt="">
                            </div> --}}
                            <form class="w-100" method="post" action="{{route('comments.create')}}">
                                @csrf
                                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                <input type="hidden" value="{{$posts->id}}" name="post_id">
                                <input class="form-control @error('content')is-invalid @enderror" type="text" placeholder="Type your comment" name="content">
                                @error('content')
                                    <label class="invalid-feedback" role="alert">
                                        <strong>You can't post an empty post!</strong>
                                    </label>
                                @enderror
                            </form>
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="collapse" id="post{{$posts->id}}">
                        <div class="card card-body">
                            @foreach ($comments as $comment)
                                <?php $user= App\Models\User::find($comment->user_id);?>
                                    @if ($posts->id == $comment->post_id)
                                    <div class="comment" id="comment{{$comment->id}}" >
                                        <div class="flexPostForm row">
                                            {{-- <div class="imgPostForm">
                                                <img src="img/man.jpg" alt="">
                                            </div> --}}
                                            <div class="boxComment col-8">
                                                <p class="name"><a href="{{route('show.users',$user->id.'-'.$user->name)}}" style="text-decoration: none; color:black;">{{$user->name}}</a></p>
                                                <p class="contentBoxComment">{{$comment->content}}</p>
                                            </div>
                                            <div class="divTime col-2">
                                                <i class="fa-solid fa-clock" style="margin-bottom :15px">
                                                    <span>{{$comment->created_at->setTimezone('Asia/Gaza')->diffForHumans()}}</span>
                                                </i>
                                            </div>
                                            @if($comment->user_id == Auth::user()->id || $posts->user_id == Auth::user()->id)
                                                <div class="delete col-2">
                                                        <form id="delete-post" action="{{ route('comments.destroy',$comment->id) }}" method="POST" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger">
                                                                <i class="fa-sharp fa-solid fa-trash" title="Delete post"></i>
                                                            </button>
                                                        </form>
                                                    </i>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>    
            @endforeach
            
</div>
<!--end content-->


<!--Bootstrap 5 js-->

@endsection
