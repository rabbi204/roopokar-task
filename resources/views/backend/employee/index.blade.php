@extends('backend.admin_master')
@section('main-content')






<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmployee">
                Add Employee
            </button>
            <br>
            <br>
            <table class="table table-bordered">
                <div class="message-delete"></div>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Roll</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Department</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="employee_tbody">
                    {{-- @foreach ($all_data as $data)
                        <tr>
                            <th>{{ $loop -> index + 1 }}</th>
                            <td>{{ $data -> roll }}</td>
                            <td>{{ $data -> name }}</td>
                            <td>{{ $data -> email }}</td>
                            <td>{{ $data -> phone }}</td>
                            <td>{{ $data -> designation }}</td>
                            <td>{{ $data -> department }}</td>
                            <td>
                                <a id="edit_employee" employee_id="{{ $data -> id }}" href="#edit_employee_modal" data-toggle="modal" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" id="delete_employee" emp_id="{{ $data -> id }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach --}}

                </tbody>
            </table>

            <!---- create employee Modal ---->
            <div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form  id="add_employee_form" action="" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add New Employee</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="message"></div>
                               <div class="form-gorup">
                                   <label for="roll">Roll</label>
                                   <input type="text" class="form-control" name="roll" id="roll">
                               </div>
                               <div class="form-gorup">
                                   <label for="name">Name</label>
                                   <input type="text" class="form-control" name="name" id="name">
                               </div>
                               <div class="form-gorup">
                                   <label for="phone">Phone</label>
                                   <input type="text" class="form-control" name="phone" id="phone">
                               </div>
                               <div class="form-gorup">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-gorup">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" name="designation" id="designation">
                                </div>
                                <div class="form-gorup">
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control" name="department" id="department">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!---- Edit employee Modal ---->
            <div class="modal fade" id="edit_employee_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form  id="edit_employee_form" action="" method="POST">
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Employee Data</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="message"></div>
                                <input type="hidden" name="emp_id">
                                <div class="form-gorup">
                                    <label for="roll">Roll</label>
                                    <input type="text" class="form-control" name="roll" id="roll">
                                </div>
                                <div class="form-gorup">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="form-gorup">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone">
                                </div>
                                <div class="form-gorup">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-gorup">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" name="designation" id="designation">
                                </div>
                                <div class="form-gorup">
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control" name="department" id="department">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
