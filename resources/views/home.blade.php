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
    <title>home</title>
</head>
<body>





{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">maak nieuwe task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="POST" action="/create">
                   @csrf
                   <div class="form-group">
                       <label for="taskname"> voer task naam in </label>
                       <textarea required class="form-control" name="taskname" id="taskname" placeholder="task name" rows="3"></textarea>
                   </div>

                   <div class="form-group">
                       <label for="taskdescription">Voer task description in </label>
                       <textarea required class="form-control" name="taskdescription" placeholder="task description" id="taskdescription" rows="3"></textarea>
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
                   <input type="hidden" name="id" value="0">
               </form>
            </div>




        </div>
    </div>
</div>









<div class="   m-4 p-4 rounded-md text-center">
    <h1 class="  shadow-xl  rounded-md bg-gradient-to-r from-[#0814AF] to-[#D60016] p-4 font-mono text-[#fff] font-bold text-8xl">
        TO DO LIST
    </h1>
</div>
<br>

<div class="grid gap-4 grid-cols-3 ">

    <div class=" min-h-[450px] p-5 rounded-3xl ml-16  h-[200px] opacity-70    transition ease-in-out delay-150 bg-black  hover:bg-gray-500 duration-300 hover:opacity-100  ">
        <div class="inline-flex">
            <i class=" m-[11px] fa-solid fa-circle" style="color: #ff0000;"></i>
            <h1 class="text-white  text-center font-mono text-3xl">Todo</h1>
        </div>
        <br>

        @foreach($task as $fortask)
            @if($fortask['list'] == 1)



                <div  class=" dropdown show">

                    <h1 class=" inline-flex text-white">{{$fortask['taskName']}}</h1>

                    <i class="fa-solid fa-ellipsis  " style="color: #ffffff;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </i>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                        <form method="get" action="/edit/{{$fortask['id']}}">
                            @csrf
                            <button type="submit"   class="dropdown-item "  >Edit</button>
                        </form>

                        <a class="dropdown-item" href="#">Show description</a>
                        <form method="post" action="/destroy/{{$fortask['id']}}" >
                            @csrf
                        <input type="submit" class="dropdown-item hover:bg-red-700 bg-red-500" value="DELETE" >
                        </form>
                    </div>
                </div>


            @endif


        @endforeach





        <a class="inline-flex hover:no-underline" type="button"  data-toggle="modal" data-target="#exampleModal" href="">
            <h1 class="text-green-600">Add New Item</h1>
            <i class="fa-solid fa-plus  m-[6px]" style="color: #ffffff;"></i>
        </a>


    </div>
    <div class="  min-h-[450px]  p-5 rounded-3xl  mr-8 ml-8  h-[200px] bg-black opacity-70  transition ease-in-out delay-150   hover:bg-gray-500 duration-300 hover:opacity-100">
        <div class="inline-flex">
            <i class=" m-[11px] fa-solid fa-circle" style="color: #FFA500;"></i>
            <h1 class="text-white  text-center font-mono text-3xl">In Progress</h1>
        </div>
        <br>
        @foreach($task as $fortask)
            @if($fortask['list'] == 2)



                <div  class=" dropdown show">

                    <h1 class=" inline-flex text-white">{{$fortask['taskName']}}</h1>

                    <i class="fa-solid fa-ellipsis  " style="color: #ffffff;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </i>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                        <form method="get" action="/edit/{{$fortask['id']}}">
                            @csrf
                            <button type="submit"   class="dropdown-item "  >Edit</button>
                        </form>

                        <a class="dropdown-item" href="#">Show description</a>
                        <form method="post" action="/destroy/{{$fortask['id']}}" >
                            @csrf
                            <input type="submit" class="dropdown-item hover:bg-red-700 bg-red-500" value="DELETE" >
                        </form>
                    </div>
                </div>


            @endif


        @endforeach
        <a class="inline-flex hover:no-underline" type="button"  data-toggle="modal" data-target="#exampleModal" href="">
            <h1 class="text-green-600">Add New Item</h1>
            <i class="fa-solid fa-plus  m-[6px]" style="color: #ffffff;"></i>
        </a>




    </div>
    <div class="  min-h-[450px] p-5 rounded-3xl mr-16  h-[200px] bg-black opacity-70 transition ease-in-out delay-150   hover:bg-gray-500 duration-300 hover:opacity-100 ">
        <div class="inline-flex ">
            <i class=" m-[11px] fa-solid fa-circle" style="color: #37ff00 ;"></i>
            <h1 class="text-white   text-center font-mono text-3xl">Done</h1>
        </div>
        <br>
        @foreach($task as $fortask)
            @if($fortask['list'] == 3)



                <div  class=" dropdown show">

                    <h1 class=" inline-flex text-white">{{$fortask['taskName']}}</h1>

                    <i class="fa-solid fa-ellipsis  " style="color: #ffffff;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </i>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                        <form method="get" action="/edit/{{$fortask['id']}}">
                            @csrf
                            <button type="submit"   class="dropdown-item "  >Edit</button>
                        </form>

                        <a class="dropdown-item" href="#">Show description</a>
                        <form method="post" action="/destroy/{{$fortask['id']}}" >
                            @csrf
                            <input type="submit" class="dropdown-item hover:bg-red-700 bg-red-500" value="DELETE" >
                        </form>
                    </div>
                </div>


            @endif


        @endforeach
        <a class="inline-flex hover:no-underline" type="button"  data-toggle="modal" data-target="#exampleModal" href="">
            <h1 class="text-green-600">Add New Item</h1>
            <i class="fa-solid fa-plus  m-[6px]" style="color: #ffffff;"></i>
        </a>

    </div>

</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
