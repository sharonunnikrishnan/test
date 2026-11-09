<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>

<h1>Edit Employee</h1>

<?php if (session()->has('errors')): ?>

    <ul>
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<form action="<?= site_url('employees/' . $employee['id'] . '/update') ?>" method="post">

    <div>
        <label>Name</label>

        <input
            type="text"
            name="name"
            value="<?= old('name', $employee['name']) ?>"
        >
    </div>

    <br>

    <div>
        <label>Email</label>

        <input
            type="email"
            name="email"
            value="<?= old('email', $employee['email']) ?>"
        >
    </div>

    <br>

    <div>
        <label>Phone</label>

        <input
            type="text"
            name="phone"
            value="<?= old('phone', $employee['phone']) ?>"
        >
    </div>

    <br>

    <div>
        <label>Department</label>

        <input
            type="text"
            name="department"
            value="<?= old('department', $employee['department']) ?>"
        >
    </div>

    <br>

    <div>
        <label>Status</label>

        <select name="status">

            <option
                value="active"
                <?= old('status', $employee['status']) === 'active' ? 'selected' : '' ?>
            >
                Active
            </option>

            <option
                value="inactive"
                <?= old('status', $employee['status']) === 'inactive' ? 'selected' : '' ?>
            >
                Inactive
            </option>

        </select>
    </div>

    <br>

    <button type="submit">Update Employee</button>

</form>

<br>

<a href="<?= site_url('employees') ?>">Back to Employees</a>

</body>
</html>