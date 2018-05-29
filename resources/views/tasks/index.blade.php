<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



 <link rel="stylesheet" href="{{ url('/css/style.css') }}">

  <title>Todo App</title>
</head>
<body>
<div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="row">
      <h1 class="header">Todo App</h1>
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

    <div class="row" style='margin-top: 10px; margin-bottom: 10px;'>
      <form action="{{ route('task.store') }}" method='POST'>
      {{ csrf_field() }}

        <div class="col-md-9">
          <input type="text" name='newTaskName' class='form-control'>
        </div>

        <div class="col-md-3">
          <input type="submit" class='btn btn-primary btn-block' value='Add Task'>
        </div>
      </form>
    </div>

  <div class="table-users">
   <div class="header">Task List</div>
    <!--Stored tasks -->
    @if (count($storedTasks) > 0)
      <table cellspacing="0" class="table col-lg-12">
        <thead>
          <th>Task #</th>
          <th></th>
          <th></th>
          <th></th>
        </thead>

        <tbody>
          @foreach ($storedTasks as $storedTask)
            <tr>
              <th>{{ $storedTask->id }}</th>
              <td>{{ $storedTask->name }}</td>
              <td><a href="{{ route('task.edit', ['tasks'=>$storedTask->id]) }}" class='btn btn-default'>Edit</a></td>
              <td>
                <form action="{{ route('task.destroy', ['tasks'=>$storedTask->id]) }}" method='POST'>
                  {{ csrf_field() }}
                  <input type="hidden" name='_method' value='DELETE'>

                  <input type="submit" class='btn btn-danger' value='Delete'>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
    </div>

    <div class="row text-center">
      {{ $storedTasks->links() }}
    </div>

  </div>
</div>
</body>
</html>