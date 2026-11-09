public function search()
{
    $keyword = $this->request->getGet('q');

    $model = new EmployeeModel();

    $employees = $model
        ->like('name', $keyword)
        ->findAll();

    return $this->response->setJSON($employees);
}