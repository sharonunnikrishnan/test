public function delete($id)
{
    $model = new EmployeeModel();

    $employee = $model->find($id);

    if (!$employee) {
        return $this->response->setJSON([
            'status'  => false,
            'message' => 'Employee not found'
        ]);
    }

    if ($model->delete($id)) {

        return $this->response->setJSON([
            'status'  => true,
            'message' => 'Employee deleted successfully'
        ]);
    }

    return $this->response->setJSON([
        'status'  => false,
        'message' => 'Failed to delete employee'
    ]);
}


if ($model->delete($id)) {

    return $this->response->setJSON([
        'status'  => true,
        'message' => 'Employee deleted successfully'
    ]);
}

return $this->response->setJSON([
    'status'  => false,
    'message' => 'Failed to delete employee'
]);