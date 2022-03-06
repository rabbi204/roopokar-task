@extends('backend.admin_master')
@section('main-content')






<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmployeeExperience">
                Add Employee Experience
            </button>
            <br>
            <br>
            <table class="table table-bordered">
                <div class="message-delete"></div>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Emp Id</th>
                        <th scope="col">organization</th>
                        <th scope="col">From Date</th>
                        <th scope="col">To Date</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Duties</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="emp_experience_tbody">
                    {{-- @foreach ($all_data as $data)
                        <tr>
                            <th>{{ $loop -> index + 1 }}</th>
                            <td>{{ $data -> employee_id }}</td>
                            <td>{{ $data -> organization }}</td>
                            <td>{{ $data -> from_date }}</td>
                            <td>{{ $data -> to_date }}</td>
                            <td>{{ $data -> designation }}</td>
                            <td>{{ $data -> duties }}</td>
                            <td>
                                <a id="edit_employee" employee_id="{{ $data -> id }}" href="#edit_employee_modal" data-toggle="modal" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" id="delete_employee" emp_id="{{ $data -> id }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach --}}

                </tbody>
            </table>

            <!---- create employee experience Modal ---->
            <div class="modal fade" id="addEmployeeExperience" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form  id="add_employee_experience_form" action="" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Employee Experience</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="message"></div>
                               <div class="form-gorup">
                                   <label for="employee_id">Employee Id</label>
                                   <input type="text" class="form-control" name="employee_id" id="employee_id">
                               </div>
                               <div class="form-gorup">
                                   <label for="organization">Organization</label>
                                   <input type="text" class="form-control" name="organization" id="organization">
                               </div>
                               <div class="form-gorup">
                                   <label for="from_date">From Date</label>
                                   <input type="date" class="form-control" name="from_date" id="from_date">
                               </div>
                               <div class="form-gorup">
                                    <label for="to_date">To Date</label>
                                    <input type="date" class="form-control" name="to_date" id="to_date">
                                </div>
                                <div class="form-gorup">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" name="designation" id="designation">
                                </div>
                                <div class="form-gorup">
                                    <label for="duties">Duties</label>
                                    <input type="text" class="form-control" name="duties" id="duties">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!---- Edit Employee Experience Modal ---->
            <div class="modal fade" id="edit_emp_experience_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form  id="edit_emp_experience_form" action="" method="POST">
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Employee Experience Data</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="message"></div>
                                <input type="hidden" name="emp_exp_id">
                                <div class="form-gorup">
                                    <label for="employee_id">Employee Id</label>
                                    <input type="text" class="form-control" name="employee_id" id="employee_id">
                                </div>
                                <div class="form-gorup">
                                    <label for="organization">Organization</label>
                                    <input type="text" class="form-control" name="organization" id="organization">
                                </div>
                                <div class="form-gorup">
                                    <label for="from_date">From Date <strong>(Y-M-D)</strong></label>
                                    <input type="text" class="form-control" name="from_date" id="from_date">
                                </div>
                                <div class="form-gorup">
                                     <label for="to_date">To Date <strong>(Y-M-D)</strong></label>
                                     <input type="text" class="form-control" name="to_date" id="to_date">
                                 </div>
                                 <div class="form-gorup">
                                     <label for="designation">Designation</label>
                                     <input type="text" class="form-control" name="designation" id="designation">
                                 </div>
                                 <div class="form-gorup">
                                     <label for="duties">Duties</label>
                                     <input type="text" class="form-control" name="duties" id="duties">
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
