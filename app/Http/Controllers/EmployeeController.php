<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('stores.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('stores.employees.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'hire_date' => 'required|date',
            'address' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100|unique:employees',
            'role' => 'required|string|in:admin,employee', // Validar solo valores permitidos para 'role'
        ]);

        // Crear el nuevo usuario automáticamente
        $user = User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'password' => bcrypt('default_password'),
        ]);

        // Crear el nuevo empleado con el rol especificado
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'hire_date' => $request->hire_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,           // Asignar el rol desde el formulario
            'user_id' => $user->id,
        ]);

        return redirect()->route('employees.index')->with('success', 'Empleado y usuario creados exitosamente.');
    }

    public function show(Employee $employee)
    {
        return view('stores.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $users = User::all();
        return view('stores.employees.edit', compact('employee', 'users'));
    }

    public function update(Request $request, Employee $employee)
    {
        // Validar los datos del formulario
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'hire_date' => 'required|date',
            'address' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100|unique:employees,email,' . $employee->id,
            'user_id' => 'required|exists:users,id|unique:employees,user_id,' . $employee->id,
            'role' => 'required|string|in:admin,employee', // Validar solo valores permitidos para 'role'
        ]);

        // Actualizar la información del empleado con el rol
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'hire_date' => $request->hire_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'role' => $request->role, // Asignar el rol desde el formulario
        ]);

        return redirect()->route('employees.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
