<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeEducation;
use App\Models\EmployeeExperience;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     *  employee profile page show
     */
    public function employeeProfile($id)
    {
        $employee =  Employee::where('id', $id) -> first();
        $all_education =  EmployeeEducation::where('employee_id', $id) -> get();
        $all_experience =  EmployeeExperience::where('employee_id', $id) -> get();

        // dd($all_experience);

        // $employee =  Employee::find($id);
        //    $all_data = DB::table('employees')
        //         ->join('employee_education','employees.id','employee_education.employee_id')
        //         ->join('employee_experiences','employees.id','employee_experiences.employee_id')
        //         ->select('employee_education.*', 'employee_experiences.*','employees.*')
        //         ->select('employee_education.*','employees.*')
        //         ->orderBy('employees.id','DESC')->get();

    //    return view('backend.employee.employee_profile', compact('employee','all_data'));

       return view('backend.employee.employee_profile', compact('employee','all_education','all_experience'));
    }
    /**
     *  show emloyee page
     */
    public function index()
    {
        // $all_data = Employee::all();
        // return view('backend.employee.index', compact('all_data'));
        return view('backend.employee.index');
    }

    public function store(Request $request)
    {
        // return $request -> all();
       Employee::create([
        'roll'  => $request -> roll,
        'name'  => $request -> name,
        'email'  => $request -> email,
        'phone'  => $request -> phone,
        'designation'  => $request -> designation,
        'department'  => $request -> department,
       ]);

    }
    /**
     *  all employee show
     */
    public function allEmployee()
    {
        $all_data = Employee::all();

        // $i = 1;
        foreach($all_data as $data){

            ?>
                    <tr>
                        <th><?php echo $data -> id ?></th>
                        <td><?php echo $data -> roll ?></td>
                        <td><?php echo $data -> name ?></td>
                        <td><?php echo $data -> email ?></td>
                        <td><?php echo $data -> phone ?></td>
                        <td><?php echo $data -> designation ?></td>
                        <td><?php echo $data -> department ?></td>
                        <td>
                            <a id="edit_employee" employee_id="<?php echo $data -> id ?>" href="#edit_employee_modal" data-toggle="modal" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" id="delete_employee" emp_id="<?php echo $data -> id ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

            <?php

        }
    }
    /**
     * employee edit
     */
    public function employeeEdit($id)
    {
       $all_data = Employee::find($id);
       return response() -> json($all_data);
    }
    /**
     *  employee Update
     */
    public function employeeUpdate(Request $request, $id)
    {
        Employee::find($id) -> update([
            'roll'  => $request -> roll,
            'name'  => $request -> name,
            'email'  => $request -> email,
            'phone'  => $request -> phone,
            'designation'  => $request -> designation,
            'department'  => $request -> department,
        ]);
    }
    /**
     *  employee delete
     */
    public function employeeDelete($id)
    {
        // echo "ok ok";
        Employee::find($id) -> delete();
        // return response() -> json([
        //     'success'   => 'Data Deleted Successfull'
        // ]);
    }
}
