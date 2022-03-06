<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeEducation;
use Illuminate\Http\Request;

class EmployeeEducationController extends Controller
{
    /**
     *  show all employee education page
     */
    public function index()
    {
        return view('backend.employee_education.index');
    }
    /**
     *  store employee education
     */
    public function employeeEducationStore(Request $request)
    {
        EmployeeEducation::create([
            'employee_id'      => $request -> employee_id,
            'exam'      => $request -> exam,
            'passing_year'      => $request -> passing_year,
            'result'      => $request -> result,
            'instituation'      => $request -> instituation
        ]);
    }
    /**
     *  show all employee education data
     */
    public function allEmployeeEducation()
    {
        $all_data = EmployeeEducation::latest() -> get();

        $i = 1;
        foreach($all_data as $data){

            ?>
                    <tr>
                        <th><?php echo $i; $i++ ?></th>
                        <td><?php echo $data -> employee_id ?></td>
                        <td><?php echo $data -> exam ?></td>
                        <td><?php echo $data -> passing_year ?></td>
                        <td><?php echo $data -> result ?></td>
                        <td><?php echo $data -> instituation ?></td>
                        <td>
                            <a id="edit_emp_education" emp_education_id="<?php echo $data -> id ?>" href="#edit_emp_education_modal" data-toggle="modal" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" id="delete_emp_education" emp_edu_id="<?php echo $data -> id ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

            <?php

        }
    }
    /**
     *  Employee Education Edit
     */
    public function employeeEducationEdit($id)
    {
        $all_data = EmployeeEducation::findOrFail($id);
        return response() -> json($all_data);
    }
    /**
     *  Employee Education Update
     */
    public function employeeEducationUpdate(Request $request, $id)
    {
        EmployeeEducation::find($id) -> update([
            'employee_id'      => $request -> employee_id,
            'exam'      => $request -> exam,
            'passing_year'      => $request -> passing_year,
            'result'      => $request -> result,
            'instituation'      => $request -> instituation
        ]);
    }
    /**
     *  Employee education data delete
     */
    public function employeeEducationDelete($id)
    {
        EmployeeEducation::findOrFail($id) -> delete();
    }
}
