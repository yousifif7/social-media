@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    
    <link rel="stylesheet" href="/css/style.css"> 

@endsection 

@section('content')

<?php 
        $posts= App\Models\Posts::where('user_id','=',$user->id)->get();
        $commentsNum= App\Models\Comments::where('user_id','=',$user->id)->get()?>

{{-- @if (\Session::has('success'))
        <div class="alert alert-success text-center" role="alert" style="text-align: right;">
            Your details has been updated successfully

        </div>      
    @endif --}}

<div class="container">
    <div class="row">
        <div class="postForm " >
            <div class="flexPostForm ">
                {{-- <div class="imgPostForm">
                    <img src="img/man.jpg" alt="">
                </div> --}}
                @if ($user->id == Auth::user()->id)                        
                <input data-bs-toggle="modal" data-bs-target="#exampleModal" class="form-control" type="text" placeholder="Type Your Post Here" aria-label=".form-control-lg example">
                @endif
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
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <textarea class="form-control txtPostModal" id="exampleFormControlTextarea1" rows="3" name="caption"></textarea>
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
    </div>
    <div class="row" style="margin-top: 10px;">
            <div class="col-sm-4"><br>
                <div class="card">
                    <div class="card-body">
                        <div class="h5 text-center">{{$user->name}}</div>
                        <li class="list-group-item">
                            <div class="h7 text-center">{{$user->bio}}</div>
                        </li>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="h6 text-muted  text-center">Gender</div>
                                <div class="h5 text-center">{{$user->gender}}</div>
                            </li>
                            <li class="list-group-item">
                                <div class="h6 text-muted text-center">Birthday</div>
                                <div class="h5 text-center">{{$user->birthday}}</div>
                            </li>
                            <li class="list-group-item">
                                <div class="h6 text-muted text-center">Status</div>
                                <div class="h5 text-center">{{$user->status}}</div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-sm-6">
                                        <div class="h6 text-muted text-center">Posts</div>
                                        <div class="h5 text-center">{{count($posts)}}</div>
                                    </div>
                                    <div class="col col-sm-6">
                                        <div class="h6 text-muted text-center">Comments</div>
                                        <div class="h5 text-center">{{count($commentsNum)}}</div>
                                    </div>
                                </div>
                            </li>
                            
                            {{-- <li class="list-group-item">Vestibulum at eros</li> --}}
                        </ul><br>
                            @if($user->id == Auth::user()->id)
                                <button class="btn btn-success w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">General details</button>

                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Edit your general information.</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <form method="get" action="{{route('update.users',$user->id)}}">
                                            @csrf
                                            <div class="mb-3 row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control-plaintext" id="staticEmail" value="{{$user->email}}" disabled>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">Name</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control" id="inputPassword" value="{{Auth::user()->name}}" name="name" >
                                                </div>
                                            </div><br>
                                            <div class="row mb-3">
                                                <span class="col-md-4 col-form-label text-md-end" id="basic-addon1">Gender: </span>
                                                    <div class="col-md-8">
                                                            @if ($user->gender=="Male")
                                                                <input type="radio" class="form-check-input " name="gender" value="Male" id="malegender" checked>
                                                                <label>Male</label>
                                                                <input type="radio" class="form-check-input " name="gender" value="Female" id="femalegender" >
                                                                <label>Female</label>
                                                                <input type="radio" class="form-check-input " name="gender" value="Other" id="othergender" >
                                                                <label>Other</label>    
                                                            @elseif ($user->gender =="Female")
                                                                <input type="radio" class="form-check-input " name="gender" value="Male" id="malegender" >
                                                                <label>Male</label>
                                                                <input type="radio" class="form-check-input " name="gender" value="Female" id="femalegender" checked >
                                                                <label>Female</label>
                                                                <input type="radio" class="form-check-input " name="gender" value="Other" id="othergender" >
                                                                <label>Other</label>
                                                            @else    
                                                                <input type="radio" class="form-check-input " name="gender" value="Male" id="malegender" >
                                                                <label>Male</label>
                                                                <input type="radio" class="form-check-input " name="gender" value="Female" id="femalegender"  >
                                                                <label>Female</label>
                                                                <input type="radio" class="form-check-input " name="gender" value="Other" id="othergender" checked>
                                                                <label>Other</label>
                                                            @endif
                                                    </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-4 col-form-label text-md-end" id="basic-addon1">Birthday</label>
                                                <div class="col-md-6">
                                                    <input type="date" class="form-control" value="{{$user->birthday}}" name="birthday" required>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="staticEmail" class="col-form-label col-sm-4">Your status</label>
                                                <div class="col-sm-8">
                                                    <select for="exampleFormControlInput1" class="form-select col-sm-8" name="status">
                                                        <option class="form-control" id="exampleFormControlInput1" value="Single">Single</option>
                                                        <option class="form-control" id="exampleFormControlInput1" value="Married">Married</option>
                                                        <option class="form-control" id="exampleFormControlInput1" value="Divorced">Divorced</option>
                                                        <option class="form-control" id="exampleFormControlInput1" value="In relation">In relation</option>
                                                    </select>
                                                </div>
                                              </div>
                                              <div class="mb-3 row">
                                                <label for="exampleFormControlTextarea1" class="form-label " >Add somthing to your bio</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio"></textarea>
                                              </div>
                                            <br>
                                            <button class="btn btn-primary w-100" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                </div>
                </div>
            </div>
            <div class="col-sm-8">    
                    @foreach ($posts as $posts )
                        <?php $userPost= App\Models\User::find($posts->user_id);?>
                      
                            <div class="postCard container bg-light">
                                <div class="postForm">
                                    <div class="flexPostForm">
                                        {{-- <div class="imgPostForm">
                                            <img src="img/man.jpg" alt="">
                                        </div> --}} 
                                        <div class="namePostCard row w-100">
                                            <h5 class="name col-11">{{$userPost->name}}</h5>
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
                                                <i class="fa-solid fa-clock" >
                                                    {{$posts->created_at->setTimezone('Asia/Gaza')->diffForHumans()}}
                                                </i>
                                            </div>
                                        </div>   
                                    </div> <br>
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
                                        <?php $commentsCount = App\Models\Comments::where('post_id', '=', $posts->id)->get()?>
                                        <a class="pNumComments" data-bs-toggle="collapse" href="#post{{$posts->id}}" role="button" aria-expanded="false" aria-controls="collapseExample" >{{count($commentsCount)}} Comments</a>
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
                                                <input class="form-control" type="text" placeholder="Type your comment" name="content">
                                            </form>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="collapse" id="post{{$posts->id}}">
                                        <div class="card card-body">
                                            @foreach ($comments as $comment)
                                                <?php $userComment= App\Models\User::find($comment->user_id);?>
                                                    @if ($posts->id == $comment->post_id)
                                                    <div class="comment" id="comment{{$comment->id}}" >
                                                        <div class="flexPostForm row">
                                                            {{-- <div class="imgPostForm">
                                                                <img src="img/man.jpg" alt="">
                                                            </div> --}}
                                                            <div class="boxComment col-8">
                                                                <p class="name "><a href="{{route('show.users',$userComment->id."-".$userComment->name)}}" style="text-decoration: none; color:black;">{{$userComment->name}}</a></p>
                                                                <p class="contentBoxComment">{{$comment->content}}</p><br>
                                                            </div>
                                                            <div class="divTime col-2">
                                                                <i class="fa-solid fa-clock">
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
        </div>
</div>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> --}}
@endsection