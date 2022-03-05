
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

            // if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) == false){
            //     $('.message').html('<p class="alert alert-danger">Invalid Email Address!! <button class="close" data-dismiss="alert">&times;</button></p>');
            // }else{

            // }
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

            // $.ajax({
            //     url : '/employee-delete/' + delete_id,
            //     success: function(data){
            //         $('.message-delete').html('<p class="alert alert-success">Employee data deleted Successful <button class="close" data-dismiss="alert">&times;</button></p>');
            //         allEmployee();
            //     }
            // });

        });

    });
})(jQuery)
