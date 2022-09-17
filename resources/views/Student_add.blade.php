<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('style.css') }}">
    <title>Student Add</title>
</head>

<body>

    <section class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mini-head">
                        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                    @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{!! \Session::get('error') !!}</li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="pageTitle">
                        <h1>Add Student</h1>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Student List</a>
                    </div>

                    <div class="content-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('Student-Add') }}" method="Post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="text" value='{{ old('name') }}' class="form-control" id="name"
                                                    placeholder="Enter name" name="name">
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" value='{{ old('email') }}' class="form-control" id="email"
                                                    placeholder="Enter email" name="email">
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="text" value='{{ old('phone') }}' class="form-control" id="phone"
                                                    placeholder="Enter phone" name="phone">
                                                @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="address">Address:</label>
                                                <input type="text" value='{{ old('address') }}' class="form-control"
                                                    id="address" placeholder="Enter address" name="address">
                                                @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city">City:</label>
                                                <input type="text" value='{{ old('city') }}' class="form-control" id="city"
                                                    placeholder="Enter city" name="city">
                                                @error('city')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="state">State:</label>
                                                <input type="text" value='{{ old('state') }}' class="form-control" id="state"
                                                    placeholder="Enter state" name="state">
                                                @error('state')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="country">Country:</label>
                                                <input type="text" value='{{ old('country') }}' class="form-control"
                                                    id="country" placeholder="Enter country" name="country">
                                                @error('country')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form_data mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="sub_name">Subject Name:</label>
                                                            <input type="text" class="form-control" id="sub_name" name="sub_name[]"
                                                                required>
                                                        </div>
                                                    </div>
        
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="marks_scored">Marks Scored:</label>
                                                            <input type="text" class="form-control" id="marks_scored"
                                                                name="marks_scored[]" required>
                                                        </div>
                                                    </div>
        
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="grade">Grade:</label>
                                                            <input type="text" class="form-control" id="grade" name="grade[]"
                                                                required>
                                                        </div>
                                                    </div>
        
                                                    <div class="col-lg-1 col-md-1 col-12">
                                                        <div class="action-btns">
                                                            <button class="btn btn-danger remove_btn" type="button">
                                                                <i class="material-icons">delete</i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="new_form_data"></div>
                                    
                                    <button class="btn btn-primary add_clone" type="button" ">Add Subject </button>
                                    <br>
                                    <br>
                                    <button type=" submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        $(".add_clone").on('click', function () {
            $(".form_data").eq(0).clone().appendTo("#new_form_data");
            if ($(".remove_btn").length == 1) {
                $(".remove_btn").eq(0).hide();
            } else {
                $(".remove_btn").show();
            }
        })
        $("body").on('click', '.remove_btn', function () {
            $(this).parents('.form_data').remove();
            if ($(".remove_btn").length == 1) {
                $(".remove_btn").eq(0).hide();
            } else {
                $(".remove_btn").show();
            }
        })
        $(document).ready(function () {
            if ($(".remove_btn").length == 1) {
                $(".remove_btn").eq(0).hide();
            } else {
                $(".remove_btn").show();
            }

        })

    </script>
</body>

</html>
