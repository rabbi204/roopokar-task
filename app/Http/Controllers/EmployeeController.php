<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

class EmployeeController extends Controller
{
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
        $data = Employee::all();

        $i = 1;
        foreach($data as $d){

            ?>
                    <tr>
                        <th><?php echo $i; $i++ ?></th>
                        <td><?php echo $d -> roll ?></td>
                        <td><?php echo $d -> name ?></td>
                        <td><?php echo $d -> email ?></td>
                        <td><?php echo $d -> phone ?></td>
                        <td><?php echo $d -> designation ?></td>
                        <td><?php echo $d -> department ?></td>
                        <td>
                            <a id="edit_employee" employee_id="<?php echo $d -> id ?>" href="#edit_employee_modal" data-toggle="modal" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" id="delete_employee" emp_id="<?php echo $d -> id ?>" class="btn btn-danger btn-sm">Delete</a>
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
