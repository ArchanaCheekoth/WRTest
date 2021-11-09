<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File upload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">  </script>
</head>
<body>
    <div class="container">
        <div class="row">
          
            <div class="col-8">
                {{-- messsage pop up open --}}
                @if(session()->get('success'))
                    <div class="alert alert-success col-8">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="col-8">
                    @if(session()->get('danger'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session()->get('danger') }}
                        </div>
                    @endif
                </div>
                @if(count($errors) > 0)
                    <div class="col-8 error">
                        <ul>
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <p class="text-center"> {{$error}}</p>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- messsage pop up close --}}



                {{-- file upload  open --}}
                <div class="card">
                    <div class="card-header text-danger">
                    File Upload any type
                    </div>
                    <div class="card-body">
                    <h5 class="card-title">Upload file</h5>
                    <form method="post" action="{{ url('store-file') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label> Choose file name </label>
                        <input type="file" name="file" accept=".pdf,.doc,.doc,.txt,.docx,.png,.jpeg,.gif"> <br> <br>
                            <button type="submit" value="submit" >Submit</button>
                        </form>
                    </div>
                </div>

                <div>
                    <a href="{{url('home')}}" type="btn btn-primary">HOME</a>
                </div>

            </div>
            <div class="col-2"></div>
        </div>
    </div>

</body>
</html