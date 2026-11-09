<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class EmployeeController extends BaseController
{
    public function index()
    {
        $model = new EmployeeModel();

        $data['employees'] = $model->findAll();

        return view('employees/index', $data);
    }

    public function create()
    {
        return view('employees/create');
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'phone' => 'required|min_length[10]|max_length[15]',
            'department' => 'required',
            'status' => 'required|in_list[active,inactive]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new EmployeeModel();

        $data = [
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'department' => $this->request->getPost('department'),
            'status'     => $this->request->getPost('status'),
        ];

        $model->insert($data);

        return redirect()->to('/employees');
    }

    public function edit($id)
    {
        $model = new EmployeeModel();

        $employee = $model->find($id);

        if (!$employee) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('employees/edit', [
            'employee' => $employee
        ]);
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email',
            'phone' => 'required|min_length[10]|max_length[15]',
            'department' => 'required',
            'status' => 'required|in_list[active,inactive]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new EmployeeModel();

        $employee = $model->find($id);

        if (!$employee) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'department' => $this->request->getPost('department'),
            'status'     => $this->request->getPost('status'),
        ];

        $model->update($id, $data);

        return redirect()->to('/employees');
    }

    public function delete($id)
    {
        $model = new EmployeeModel();

        $employee = $model->find($id);

        if (!$employee) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $model->delete($id);

        return redirect()->to('/employees');
    }
}