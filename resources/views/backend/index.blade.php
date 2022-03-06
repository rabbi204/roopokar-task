@extends('backend.admin_master')
@section('main-content')






<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2>All Employee List</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Emp Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Department</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_employee as $data)
                        <tr>
                            <th>{{ $loop -> index + 1 }}</th>
                            <td>{{ $data -> name }}</td>
                            <td>{{ $data -> email }}</td>
                            <td>{{ $data -> phone }}</td>
                            <td>{{ $data -> designation }}</td>
                            <td>{{ $data -> department }}</td>
                            {{-- <td>{{ $data -> instituation }}</td>
                            <td>{{ $data -> organization }}</td> --}}
                            <td>
                                <a href="{{ route('employee.profile', $data -> id) }}" class="btn btn-success btn-sm">Profile</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
