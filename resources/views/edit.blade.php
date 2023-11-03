<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/3edd1a3cb2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/app.css">
    <title>edit</title>
</head>
<body>


<div class="modal-body">
    <form method="POST" action="/save">
        @csrf
        <div class="form-group">
            <label for="taskname"> voer task naam in </label>
            <textarea required class="form-control" name="taskname" id="taskname" placeholder="{{$taskdata['taskName']}}" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="taskdescription">Voer task description in </label>
            <textarea required class="form-control" name="taskdescription" placeholder="{{$taskdata['taskDescription']}}" id="taskdescription" rows="3"></textarea>
        </div>



        <div class="form-group">
            <label for="exampleFormControlSelect1">waar wilt u de nieuwe task</label>
            <select required class="form-control" name="list" id="exampleFormControlSelect1">
                <option>To Do</option>
                <option>In Progress</option>
                <option>Done</option>

            </select>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save changes</button>
        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" data-dismiss="modal">Close</button>
        <input type="hidden" name="id" value="{{$taskdata['id']}}" >
    </form>
</div>








</body>
</html>
