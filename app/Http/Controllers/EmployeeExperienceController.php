<?php

namespace App\Http\Controllers;

use App\Models\EmployeeExperience;
use Illuminate\Http\Request;

class EmployeeExperienceController extends Controller
{
    /**
     *  Employee experience page show
     */
    public function index()
    {
        return view('backend.employee_experience.index');
    }
    /**
     *  store employee experience data
     */
    public function employeeExperinceStore(Request $request)
    {
        EmployeeExperience::create([
            'employee_id'   => $request -> employee_id,
            'organization'   => $request -> organization,
            'from_date'   => $request -> from_date,
            'to_date'   => $request -> to_date,
            'designation'   => $request -> designation,
            'duties'   => $request -> duties,
        ]);
    }
    /**
     *  all employee experices
     */
    public function allEmployeeExperience()
    {
        $all_data = EmployeeExperience::latest() -> get();

        $i = 1;

        foreach ($all_data as $data) {
            ?>
                    <tr>
                        <th><?php echo $i; $i++ ?></th>
                        <td><?php echo $data -> employee_id ?></td>
                        <td><?php echo $data -> organization ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data -> from_date)) ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data -> to_date)) ?></td>
                        <td><?php echo $data -> designation ?></td>
                        <td><?php echo $data -> duties ?></td>
                        <td>
                            <a id="edit_emp_experience" emp_experience_id="<?php echo $data -> id ?>" href="#edit_emp_experience_modal" data-toggle="modal" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" id="delete_emp_experience" emp_exp_id="<?php echo $data -> id ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

            <?php
        }
    }
    /**
     *  employee experience edit
     */
    public function employeeExperienceEdit($id)
    {
        $all_data = EmployeeExperience::findOrFail($id);
        return response() -> json($all_data);
    }
    /**
     *  Employee Experience data update
     */
    public function employeeExperienceUpdate(Request $request, $id)
    {
        EmployeeExperience::find($id)-> update([
            'employee_id'   => $request -> employee_id,
            'organization'   => $request -> organization,
            'from_date'   => $request -> from_date,
            'to_date'   => $request -> to_date,
            'designation'   => $request -> designation,
            'duties'   => $request -> duties,
        ]);
    }
    /**
     *  Employee Experience Data Delete
     */
    public function employeeExperienceDelete($id)
    {
        EmployeeExperience::find($id)-> delete();
    }
}
