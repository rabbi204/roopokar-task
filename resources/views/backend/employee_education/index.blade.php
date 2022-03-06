@extends('backend.admin_master')
@section('main-content')






<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmployeeEducation">
                Add Employee Education
            </button>
            <br>
            <br>
            <table class="table table-bordered">
                <div class="message-delete"></div>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Emp Id</th>
                        <th scope="col">Exam</th>
                        <th scope="col">Passing Year</th>
                        <th scope="col">Result</th>
                        <th scope="col">Instituation</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="emp_education_tbody">
                    {{-- @foreach ($all_data as $data)
                        <tr>
                            <th>{{ $loop -> index + 1 }}</th>
                            <td>{{ $data -> employee_id }}</td>
                            <td>{{ $data -> exam }}</td>
                            <td>{{ $data -> passing_year }}</td>
                            <td>{{ $data -> result }}</td>
                            <td>{{ $data -> instituation }}</td>
                            <td>
                                <a id="edit_employee" employee_id="{{ $data -> id }}" href="#edit_employee_modal" data-toggle="modal" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" id="delete_employee" emp_id="{{ $data -> id }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach --}}

                </tbody>
            </table>

            <!---- create employee Modal ---->
            <div class="modal fade" id="addEmployeeEducation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form  id="add_employee_education_form" action="" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Employee Education</h5>

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
                                   <label for="exam">Exam</label>
                                   <input type="text" class="form-control" name="exam" id="exam">
                               </div>
                               <div class="form-gorup">
                                   <label for="passing_year">Passing Year</label>
                                   <input type="text" class="form-control" name="passing_year" id="passing_year">
                               </div>
                               <div class="form-gorup">
                                    <label for="result">Result</label>
                                    <input type="text" class="form-control" name="result" id="result">
                                </div>
                                <div class="form-gorup">
                                    <label for="instituation">Instituation</label>
                                    <input type="text" class="form-control" name="instituation" id="instituation">
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
            <div class="modal fade" id="edit_emp_education_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form  id="edit_emp_education_form" action="" method="POST">
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Employee Education Data</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="message"></div>
                                <input type="hidden" name="emp_edu_id">
                                <div class="form-gorup">
                                    <label for="employee_id">Employee Id</label>
                                    <input type="text" class="form-control" name="employee_id" id="employee_id">
                                </div>
                                <div class="form-gorup">
                                    <label for="exam">Exam</label>
                                    <input type="text" class="form-control" name="exam" id="exam">
                                </div>
                                <div class="form-gorup">
                                    <label for="passing_year">Passing Year</label>
                                    <input type="text" class="form-control" name="passing_year" id="passing_year">
                                </div>
                                <div class="form-gorup">
                                     <label for="result">Result</label>
                                     <input type="text" class="form-control" name="result" id="result">
                                 </div>
                                 <div class="form-gorup">
                                     <label for="instituation">Instituation</label>
                                     <input type="text" class="form-control" name="instituation" id="instituation">
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
