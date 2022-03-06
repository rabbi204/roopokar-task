
(function($) {
    $(document).ready(function(){

        // all employee show
        function allEmployee(){
            $.ajax({
                url: '/employee-all',
                success: function(data){
                    // alert(data);
                    $('tbody#employee_tbody').html(data);
                }
            });
        }
        allEmployee();

        // add new employee
        $(document).on('submit','form#add_employee_form', function(e){
            e.preventDefault();

            let roll = $('form#add_employee_form input[name="roll"]').val();
            let name = $('form#add_employee_form input[name="name"]').val();
            let email = $('form#add_employee_form input[name="email"]').val();
            let phone = $('form#add_employee_form input[name="phone"]').val();
            let designation = $('form#add_employee_form input[name="designation"]').val();
            let department = $('form#add_employee_form input[name="department"]').val();

            if( roll == '' || name == '' || phone =='' || email == '' || designation == '' || department == ''){
                $('.message').html('<p class="alert alert-danger">All Feilds are required!! <button class="close" data-dismiss="alert">&times;</button></p>');
            }else if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) == false){
                $('.message').html('<p class="alert alert-danger">Invalid Email Address!! <button class="close" data-dismiss="alert">&times;</button></p>');
            }else{
                $.ajax({
                    url : '/employee-store',
                    method : "POST",
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    success : function(data){
                        $('.message').html('<p class="alert alert-success">Employee Added Successful <button class="close" data-dismiss="alert">&times;</button></p>');
                        $('form#add_employee_form')[0].reset();
                        allEmployee();
                    }
                });
            }
        });

        // employee edit data
        $(document).on('click','a#edit_employee',function(e){
            e.preventDefault();

            let id = $(this).attr('employee_id');
            // alert(id);
            $.ajax({
                url: '/employee-edit/' + id,
                dataType: 'json',
                success: function(data){
                    $('#edit_employee_modal input[name="emp_id"]').val(data.id);
                    $('#edit_employee_modal input[name="roll"]').val(data.roll);
                    $('#edit_employee_modal input[name="name"]').val(data.name);
                    $('#edit_employee_modal input[name="email"]').val(data.email);
                    $('#edit_employee_modal input[name="phone"]').val(data.phone);
                    $('#edit_employee_modal input[name="designation"]').val(data.designation);
                    $('#edit_employee_modal input[name="department"]').val(data.department);
                }
            });
        });

         // Update employee
         $(document).on('submit','form#edit_employee_form', function(e){
            e.preventDefault();

            let id =  $('#edit_employee_modal input[name="emp_id"]').val();
            // alert(id);

            let roll = $('form#add_employee_form input[name="roll"]').val();
            let name = $('form#add_employee_form input[name="name"]').val();
            let email = $('form#add_employee_form input[name="email"]').val();
            let phone = $('form#add_employee_form input[name="phone"]').val();
            let designation = $('form#add_employee_form input[name="designation"]').val();
            let department = $('form#add_employee_form input[name="department"]').val();

            $.ajax({
                url : '/employee-update/' + id,
                method : "POST",
                contentType: false,
                processData: false,
                data: new FormData(this),
                success : function(data){
                    // alert(data);
                    $('.message').html('<p class="alert alert-success">Employee Updated Successful <button class="close" data-dismiss="alert">&times;</button></p>');
                    $('form#edit_employee_form')[0].reset();
                    allEmployee();
                }
            });

        });

        // employee delete
        $(document).on('click','a#delete_employee',function(e){
            e.preventDefault();

            let delete_id = $(this).attr('emp_id');

            let conf = confirm('Are you sure?');

            if (conf == true) {
                $.ajax({
                    url : '/employee-delete/' + delete_id,
                    success: function(data){
                        $('.message-delete').html('<p class="alert alert-success">Employee data deleted Successful <button class="close" data-dismiss="alert">&times;</button></p>');
                        allEmployee();
                    }
                });
            }else{
                return false;
            }
        });

        /*****************************************************************************************************
         *           ALL EMPLOYEE EDUCATION CODE
         ****************************************************************************************************/
         // all employeeEducation data show
         function allEmployeeEducation(){
            $.ajax({
                url: '/emp-education-all',
                success: function(data){
                    // alert(data);
                    $('tbody#emp_education_tbody').html(data);
                }
            });
        }
        allEmployeeEducation();

        //add employee education
        $(document).on('submit','form#add_employee_education_form',function(e){
            e.preventDefault();

            //getting value of form
            let employee_id = $('form#add_employee_education_form input[name="employee_id"]').val();
            let exam = $('form#add_employee_education_form input[name="exam"]').val();
            let passing_year = $('form#add_employee_education_form input[name="passing_year"]').val();
            let result = $('form#add_employee_education_form input[name="result"]').val();
            let instituation = $('form#add_employee_education_form input[name="instituation"]').val();
            // alert(employee_id + exam + passing_year + result + instituation);

            if( employee_id == '' || exam == '' || passing_year =='' || result == '' || instituation == ''){
                $('.message').html('<p class="alert alert-danger">All Feilds are required!! <button class="close" data-dismiss="alert">&times;</button></p>');
            }else{
                //send ajax request
                $.ajax({
                    url : '/emp-education-store',
                    method : 'POST',
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    success: function(data){
                        // alert(data);
                        $('.message').html('<p class="alert alert-success">Employee Added Successful <button class="close" data-dismiss="alert">&times;</button></p>');
                        $('form#add_employee_education_form')[0].reset();
                        allEmployeeEducation();
                    }
                });
            }

        });

        // Edit employee education data
        $(document).on('click','a#edit_emp_education',function(e){
            e.preventDefault();
            let id = $(this).attr('emp_education_id');
            // alert(id);

            $.ajax({
                url: '/emp-education-edit/' + id,
                dataType: 'json',
                success: function(data){
                    // alert(data.result);
                    $('#edit_emp_education_modal input[name="emp_edu_id"]').val(data.id);
                    $('#edit_emp_education_modal input[name="employee_id"]').val(data.employee_id);
                    $('#edit_emp_education_modal input[name="exam"]').val(data.exam);
                    $('#edit_emp_education_modal input[name="passing_year"]').val(data.passing_year);
                    $('#edit_emp_education_modal input[name="result"]').val(data.result);
                    $('#edit_emp_education_modal input[name="instituation"]').val(data.instituation);
                }
            });

        });

        // Update employee Education data
        $(document).on('submit','form#edit_emp_education_form', function(e){
            e.preventDefault();

            let id =  $('#edit_emp_education_form input[name="emp_edu_id"]').val();
            // alert(id);

            let roll = $('form#edit_emp_education_form input[name="employee_id"]').val();
            let name = $('form#edit_emp_education_form input[name="exam"]').val();
            let email = $('form#edit_emp_education_form input[name="passing_year"]').val();
            let phone = $('form#edit_emp_education_form input[name="result"]').val();
            let designation = $('form#edit_emp_education_form input[name="instituation"]').val();

            $.ajax({
                url : '/emp-education-update/' + id,
                method : "POST",
                contentType: false,
                processData: false,
                data: new FormData(this),
                success : function(data){
                    // alert(data);
                    $('.message').html('<p class="alert alert-success">Employee Education Updated Successful <button class="close" data-dismiss="alert">&times;</button></p>');
                    $('form#edit_emp_education_form')[0].reset();
                    allEmployeeEducation();
                }
            });

        });
        // DELETE EMPLOYEE EDUCATION DATA
        $(document).on('click','a#delete_emp_education',function(e){
            e.preventDefault();

            let delete_id = $(this).attr('emp_edu_id');
            // alert(delete_id);

            let conf = confirm('Are you sure?');

            if (conf == true) {
                $.ajax({
                    url : '/emp-education-delete/' + delete_id,
                    success: function(data){
                        // alert(data);
                        $('.message-delete').html('<p class="alert alert-success">Employee Education data deleted Successful <button class="close" data-dismiss="alert">&times;</button></p>');
                        allEmployeeEducation();
                    }
                });
            }else{
                return false;
            }

        });

        /*****************************************************************************************************
         *           ALL EMPLOYEE EXPERINECE CODE
         ****************************************************************************************************/
        //  // all employeeExperience data show
         function allEmployeeExperience(){
            $.ajax({
                url: '/emp-experience-all',
                success: function(data){
                    // alert(data);
                    $('tbody#emp_experience_tbody').html(data);
                }
            });
        }
        allEmployeeExperience();

        //add employee experince
        $(document).on('submit','form#add_employee_experience_form',function(e){
            e.preventDefault();

            //getting value of form
            let employee_id = $('form#add_employee_experience_form input[name="employee_id"]').val();
            let organization = $('form#add_employee_experience_form input[name="organization"]').val();
            let from_date = $('form#add_employee_experience_form input[name="from_date"]').val();
            let to_date = $('form#add_employee_experience_form input[name="to_date"]').val();
            let designation = $('form#add_employee_experience_form input[name="designation"]').val();
            let duties = $('form#add_employee_experience_form input[name="duties"]').val();
            // alert(employee_id + organization + from_date + to_date + designation + duties);

            if( employee_id == '' || organization == '' || from_date =='' || to_date == '' || designation == '' || duties== ''){
                $('.message').html('<p class="alert alert-danger">All Feilds are required!! <button class="close" data-dismiss="alert">&times;</button></p>');
            }else{
                //send ajax request
                $.ajax({
                    url : '/emp-experience-store',
                    method : 'POST',
                    contentType: false,
                    processData: false,
                    data: new FormData(this),
                    success: function(data){
                        // alert(data);
                        $('.message').html('<p class="alert alert-success">Employee Experience Added Successful <button class="close" data-dismiss="alert">&times;</button></p>');
                        $('form#add_employee_experience_form')[0].reset();
                        allEmployeeExperience();
                    }
                });
            }

        });

        // Edit employee education data
        $(document).on('click','a#edit_emp_experience',function(e){
            e.preventDefault();
            let id = $(this).attr('emp_experience_id');
            // alert(id);

            $.ajax({
                url: '/emp-experience-edit/' + id,
                dataType: 'json',
                success: function(data){
                    // alert(data.designation);
                    $('#edit_emp_experience_modal input[name="emp_exp_id"]').val(data.id);
                    $('#edit_emp_experience_modal input[name="employee_id"]').val(data.employee_id);
                    $('#edit_emp_experience_modal input[name="organization"]').val(data.organization);
                    $('#edit_emp_experience_modal input[name="from_date"]').val(data.from_date);
                    $('#edit_emp_experience_modal input[name="to_date"]').val(data.to_date);
                    $('#edit_emp_experience_modal input[name="designation"]').val(data.designation);
                    $('#edit_emp_experience_modal input[name="duties"]').val(data.duties);
                }
            });

        });

        // Update employee Education data
        $(document).on('submit','form#edit_emp_experience_form', function(e){
            e.preventDefault();

            let id =  $('#edit_emp_experience_form input[name="emp_exp_id"]').val();
            // alert(id);

            let roll = $('form#edit_emp_experience_form input[name="employee_id"]').val();
            let name = $('form#edit_emp_experience_form input[name="organization"]').val();
            let email = $('form#edit_emp_experience_form input[name="from_date"]').val();
            let phone = $('form#edit_emp_experience_form input[name="to_date"]').val();
            let designation = $('form#edit_emp_experience_form input[name="designation"]').val();
            let duties = $('form#edit_emp_experience_form input[name="duties"]').val();

            $.ajax({
                url : '/emp-experience-update/' + id,
                method : "POST",
                contentType: false,
                processData: false,
                data: new FormData(this),
                success : function(data){
                    // alert(data);
                    $('.message').html('<p class="alert alert-success">Employee Experience Data Updated Successful <button class="close" data-dismiss="alert">&times;</button></p>');
                    $('form#edit_emp_experience_form')[0].reset();
                    allEmployeeExperience();
                }
            });

        });

        // DELETE EMPLOYEE Experience DATA
        $(document).on('click','a#delete_emp_experience',function(e){
            e.preventDefault();

            let delete_id = $(this).attr('emp_exp_id');
            // alert(delete_id);

            let conf = confirm('Are you sure?');

            if (conf == true) {
                $.ajax({
                    url : '/emp-experience-delete/' + delete_id,
                    success: function(data){
                        // alert(data);
                        $('.message-delete').html('<p class="alert alert-success">Employee Experience data deleted Successful <button class="close" data-dismiss="alert">&times;</button></p>');
                        allEmployeeExperience();
                    }
                });
            }else{
                return false;
            }

        });

    });
})(jQuery)
