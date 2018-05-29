<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ url('/css/style.css') }}">

  <title>Todo App</title>
</head>
<body style="background-color: #91ced4;">
<div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="row">
      <h1 class="header">Edit Task</h1>
    </div>

    <!--Success message -->
    @if (Session::has('success'))
      <div class="alert alert-success">
        <strong>Success:</strong> {{ Session::get('success') }}
      </div>
    @endif

     <!--Error messag -->
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Error:</strong>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="row">
      <form action="{{ route('task.update', [$taskUnderEdit->id]) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
        <input type="text" name="updatedTask" class="form-control input-lg" value="{{ $taskUnderEdit->name}}">
        </div>
        <div class="form-goup">
        <input type="submit" value="Save Changes" class="btn btn-success btn-lg">
        <a href="{{ route('task.index') }}" class="btn btn-danger btn-lg pull-right">Go Back</a>
        </div>
      </form>
    </div>


    <div class="row text-center">
      
    </div>

  </div>
</div>
</body>
</html>