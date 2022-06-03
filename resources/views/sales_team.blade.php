<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Sales Team Management</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Sales Team Management</a>
    </nav>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Sales Team</h4>
            </div>
            <div class="card-body">
                <div><button type="button" class="btn btn-dark mb-3 float-right" data-toggle="modal" data-target="#Add_New">
                        Add New
                    </button></div>
                <table class=" table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Current Rout</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sales_table as $row)
                        <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->Name}}</td>
                            <td>{{$row->Email}}</td>
                            <td>{{$row->Telephone}}</td>
                            <td>{{$row->Current_Rout}}</td>
                            <td><button value="{{$row->id}}" class="view btn btn-info btn-sm">View</button></td>
                            <td><button value="{{$row->id}}" class="edit_btn btn btn-warning btn-sm">Edit</button></td>
                            <td>
                                <form action="/Delete_Member/{{$row->id}}" method="POST">
                                    {{method_field('DELETE')}}
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <!-- Add New Model -->
    <div class="modal fade" id="Add_New" tabindex="-1" aria-labelledby="Add_NewLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Add_NewLabel">Add New</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/Add_Sales_Member" method="POST">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Full Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="FullName" required placeholder="Dileepa Rajapakshe" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Email Address:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" name="Email" required placeholder="rdmrajapakshe@gmail.com" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Telephone:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" name="Telephone" required placeholder="0787413957" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Joined Date:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" name="JoinedDate" required class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Current Routes:</label>
                            </div>
                            <div class="col-md-9">
                                <select name="CurrentRoutes" class="form-control">
                                    <option value="Rambukkana">Rambukkana</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Comments:</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="Comments" required class="form-control" cols="5"></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back to List</button>
                    <button type="submit" class="btn btn-dark">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Model -->
    <div class="modal fade Edit_Model" id="Edit_Model" tabindex="-1" aria-labelledby="Edit_ModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Edit_ModelLabel">Edit Sales Representative</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/Edit_Sales_Member" method="POST">
                        @csrf
                        <input type="hidden" id="Edit_id" name="id">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>ID:</label>
                            </div>
                            <div class="col-md-9">
                                <fieldset disabled>
                                    <input type="text" id="Edit_id2" name="id" required class="form-control">
                                </fieldset>

                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Full Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="Edit_Name" name="FullName" required placeholder="Dileepa Rajapakshe" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Email Address:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" id="Edit_Email" name="Email" required placeholder="rdmrajapakshe@gmail.com" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Telephone:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" id="Edit_Telephone" name="Telephone" required placeholder="0787413957" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Joined Date:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" id="Edit_JD" name="JoinedDate" required class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Current Routes:</label>
                            </div>
                            <div class="col-md-9">
                                <select name="CurrentRoutes" class="form-control">
                                    <option value="Rambukkana">Rambukkana</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Comments:</label>
                            </div>
                            <div class="col-md-9">
                                <textarea id="Edit_Comments" name="Comments" required class="form-control" cols="5"></textarea>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back to List</button>
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- View Model -->
    <div class="modal fade View_Model" id="View_Model" tabindex="-1" aria-labelledby="Edit_ModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="View_Member"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <fieldset disabled>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>ID:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="View_id" name="id" required class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Full Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="View_Name" name="FullName" required placeholder="Dileepa Rajapakshe" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Email Address:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" id="View_Email" name="Email" required placeholder="rdmrajapakshe@gmail.com" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Telephone:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" id="View_Telephone" name="Telephone" required placeholder="0787413957" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Joined Date:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" id="View_JD" name="JoinedDate" required class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Current Routes:</label>
                            </div>
                            <div class="col-md-9">
                                <select name="CurrentRoutes" class="form-control">
                                    <option value="Rambukkana">Rambukkana</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Comments:</label>
                            </div>
                            <div class="col-md-9">
                                <textarea id="View_Comments" name="Comments" required class="form-control" cols="5"></textarea>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <!-- Get Edit Info -->
    <script>
        $(document).ready(function() {
            $('.edit_btn').click(function() {
                edit_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/Get_Edit_Info/",
                    method: "POST",
                    data: {
                        id: edit_id
                    },
                    success: function(data) {
                        // console.log(data);
                        $("#Edit_id").val(data.success.id);
                        $("#Edit_id2").val(data.success.id);
                        $("#Edit_Name").val(data.success.Name);
                        $("#Edit_Email").val(data.success.Email);
                        $("#Edit_Telephone").val(data.success.Telephone);
                        $("#Edit_JD").val(data.success.Joined_Date);
                        $("#Edit_Comments").val(data.success.Comments);
                        $(".Edit_Model").modal();
                    }
                })
            });
        });
    </script>
    <!-- View Info -->
    <script>
        $(document).ready(function() {
            $('.view').click(function() {
                edit_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/Get_Edit_Info/",
                    method: "POST",
                    data: {
                        id: edit_id
                    },
                    success: function(data) {
                        // console.log(data);
                        $("#View_Member").text(data.success.Name);
                        $("#View_id").val(data.success.id);
                        $("#View_Name").val(data.success.Name);
                        $("#View_Email").val(data.success.Email);
                        $("#View_Telephone").val(data.success.Telephone);
                        $("#View_JD").val(data.success.Joined_Date);
                        $("#View_Comments").val(data.success.Comments);
                        $(".View_Model").modal();
                    }
                })
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

</body>

</html>