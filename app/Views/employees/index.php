<!DOCTYPE html>
<html>
<head>
    <title>Employees</title>
</head>
<body>

<h1>Employee Management</h1>

<a href="<?= site_url('employees/create') ?>">Add Employee</a>

<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?= esc($employee['id']) ?></td>
                <td><?= esc($employee['name']) ?></td>
                <td><?= esc($employee['email']) ?></td>
                <td><?= esc($employee['phone']) ?></td>
                <td><?= esc($employee['department']) ?></td>
                <td><?= esc($employee['status']) ?></td>
                <td>
                    <a href="<?= site_url('employees/' . $employee['id'] . '/edit') ?>">
                        Edit
                    </a>
                    <form
                        action="<?= site_url('employees/' . $employee['id'] . '/delete') ?>"
                        method="post"
                        style="display:inline;"
                        onsubmit="return confirm('Are you sure you want to delete this employee?')"
                    >
                        <button type="submit">Delete</button>
                    </form>
                </td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>