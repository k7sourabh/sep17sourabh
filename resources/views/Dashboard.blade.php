<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('style.css') }}">
    <title>Student List</title>
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
                    @if (isset($_GET['dlt']) && $_GET['dlt']==1)
                    <div class="alert alert-success">
                        <ul>
                            <li>Student Data Deleted SuccessFully</li>
                        </ul>
                    </div>
                    @elseif(isset($_GET['dlt']) && $_GET['dlt']==0)
                    <div class="alert alert-danger">
                        <ul>
                            <li>Something Went Wrong</li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="pageTitle">
                        <h1>Student Data</h1>
                        <a href="{{ route('Student-Add-view') }}" class="btn btn-primary">Add</a>
                    </div>

                    <div class="content-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Name</th>
                                                <th>Student</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Country</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if(isset($student_data) && !empty($student_data))
                                            @foreach ($student_data as $key=>$value)
                                            <tr>
                                                <td>{{ ($key+1) }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->students }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td>{{ $value->address }}</td>
                                                <td>{{ $value->city }}</td>
                                                <td>{{ $value->state }}</td>
                                                <td>{{ $value->country }}</td>
                                                <td>{{ $value->status }}</td>
                                                <td>
                                                    <div class="action-btns">
                                                        <button type="button" class="btn btn-danger delete"
                                                            student_id="{{ $value->id }}"><i
                                                                class="material-icons">delete</i></button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop_{{ $value->id }}"><i class="material-icons">visibility</i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    @if(isset($student_data) && !empty($student_data))
        @foreach ($student_data as $key01=>$value01)
            @if (isset($value01->subject) && !empty($value01->subject))
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop_{{ $value01->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Subject Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="content-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Subject No</th>
                                                            <th>Subject Name</th>
                                                            <th>Marks</th>
                                                            <th>Grade</th>
                                                        </tr>
                                                        @foreach ($value01->subject as $sub_key=>$sub_val)
                                                        <tr>
                                                            <td>{{ ($sub_key+1) }}</td>
                                                            <td>{{ $sub_val->name }}</td>
                                                            <td>{{ $sub_val->marks_scored }}</td>
                                                            <td>{{ $sub_val->grade }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $('.delete').click(function () {
            var student_id = $(this).attr('student_id');
            $.ajax({
                url: "{{ route('Student-delete') }}" + "?st_id=" + student_id,
                method: "GET",
                success: function (result) {
                    var status_arr = JSON.parse(result);
                    if (status_arr.status === 1) {
                        window.location.href = "{{ url('/dashboard') }}?dlt=1";
                    } else if (status_arr.status === 0) {
                        window.location.href = "{{ url('/dashboard') }}?dlt=0";
                    }
                }
            })
        });

    </script>
</body>

</html>
