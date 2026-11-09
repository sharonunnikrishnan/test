$routes->get('/employees', 'EmployeeController::index');

$routes->get('/employees/create', 'EmployeeController::create');
$routes->post('/employees', 'EmployeeController::store');

$routes->get('/employees/(:num)/edit', 'EmployeeController::edit/$1');
$routes->post('/employees/(:num)/update', 'EmployeeController::update/$1');

$routes->post('/employees/(:num)/delete', 'EmployeeController::delete/$1');

$routes->get('/employees/search', 'EmployeeController::search');