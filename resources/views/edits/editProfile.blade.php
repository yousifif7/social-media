<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit profile</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    

</head>
<body class="container ">
    <div class="container bg-light" style="margin-top:20px;"><br>
        <h3>You can Add general details about you from here.</h3>
        <form method="post" action="{{route('profile.store')}}">
            @csrf
            <input type="text" class="form-control-plaintext" id="staticEmail" value="{{$user->id}}" name="user_id" hidden>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                <input type="text" class="form-control-plaintext" id="staticEmail" value="{{$user->email}}" disabled>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-form-label col-sm-4">Your current marrage status</label>
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
                <label for="exampleFormControlTextarea1" class="form-label col-sm-3" >Enter your bio</label>
                <textarea class="form-control col-sm-9" id="exampleFormControlTextarea1" rows="3" name="bio"></textarea>
              </div>  <br>
              <button class="btn btn-outline-success w-100" type="submit">Submit</button><br>
              <br>
        </form>            
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>