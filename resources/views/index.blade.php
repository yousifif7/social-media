@extends('layouts.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--style-->
    <link rel="stylesheet" href="css/style.css">
@endsection    


@section('content')

<!--start nav bar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand btn brand" href="{{url('index')}}">Social Media</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText" style="flex-grow: 0;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('login')}}">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link asignUp" href="{{route('register')}}">SIGNUP</a>
          </li>
        </ul>
      <!--if login-->
        <!-- <div class="flexPostForm">
            <div class="imgPostForm imgHead" >
                <img src="img/man.jpg" alt="">
            </div>
            <div class="namePostCard">
                <p class="name">Omar Khaled</p>
            </div>   
        </div>  -->
    </div>
    </div>
</nav>
<!--end nav bar-->

<!--start content-->
<div class="container">
    <div class="postForm">
       <div class="flexPostForm">
        <div class="imgPostForm">
            <img src="img/man.jpg" alt="">
        </div>
        <input data-bs-toggle="modal" data-bs-target="#exampleModal" class="form-control" type="text" placeholder="Type Your Post Here" aria-label=".form-control-lg example">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control txtPostModal" id="exampleFormControlTextarea1" rows="3">
                        Type your post here...
                    </textarea>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Post</button>
                </div>
            </div>
            </div>
        </div>
       </div>     
    </div>
    <div class="postCard">
        <div class="postForm">
            <div class="flexPostForm">
                <div class="imgPostForm">
                    <img src="img/man.jpg" alt="">
                </div>
                <div class="namePostCard">
                    <p class="name">Omar Khaled</p>
                    <div class="divTime">
                        <i class="fa-solid fa-clock"></i>
                        <p>4h</p>
                    </div>
                </div>   
            </div>
            <div class="imgPost">
            <img src="img/business.jpg" class="img-fluid rounded" alt="...">
            </div>
            <div class="divNumComments">
                <i class="fa-solid fa-comment pNumComments"></i>
                <p class="pNumComments">22 Comments</p>
            </div>
            <div>
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/man.jpg" alt="">
                    </div>
                    <input class="form-control" type="text" placeholder="Type your comment" aria-label=".form-control-lg example">
                </div>
            </div>
            <hr class="hr">
            <div class="comment">
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/man.jpg" alt="">
                    </div>
                    <div class="boxComment">
                        <p class="nameBoxComment">Omar Khaled</p>
                        <p class="contentBoxComment">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <div class="divTime">
                            <i class="fa-solid fa-clock"></i>
                            <p>4h</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment">
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/girlface.jpg" alt="">
                    </div>
                    <div class="boxComment">
                        <p class="nameBoxComment">Amal Ahmed</p>
                        <p class="contentBoxComment">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <div class="divTime">
                            <i class="fa-solid fa-clock"></i>
                            <p>4h</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <div class="postCard">
        <div class="postForm">
            <div class="flexPostForm">
                <div class="imgPostForm">
                    <img src="img/man.jpg" alt="">
                </div>
                <div class="namePostCard">
                    <p class="name">Omar Khaled</p>
                    <div class="divTime">
                        <i class="fa-solid fa-clock"></i>
                        <p>4h</p>
                    </div>
                </div>   
            </div>
            <div class="imgPost">
            <img src="img/business.jpg" class="img-fluid rounded" alt="...">
            </div>
            <div class="divNumComments">
                <i class="fa-solid fa-comment pNumComments"></i>
                <p class="pNumComments">22 Comments</p>
            </div>
            <div>
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/man.jpg" alt="">
                    </div>
                    <input class="form-control" type="text" placeholder="Type your comment" aria-label=".form-control-lg example">
                </div>
            </div>
            <hr class="hr">
            <div class="comment">
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/man.jpg" alt="">
                    </div>
                    <div class="boxComment">
                        <p class="nameBoxComment">Omar Khaled</p>
                        <p class="contentBoxComment">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <div class="divTime">
                            <i class="fa-solid fa-clock"></i>
                            <p>4h</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment">
                <div class="flexPostForm">
                    <div class="imgPostForm">
                        <img src="img/girlface.jpg" alt="">
                    </div>
                    <div class="boxComment">
                        <p class="nameBoxComment">Amal Ahmed</p>
                        <p class="contentBoxComment">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        <div class="divTime">
                            <i class="fa-solid fa-clock"></i>
                            <p>4h</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
<!--end content-->


<!--Bootstrap 5 js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection
</body>
</html>