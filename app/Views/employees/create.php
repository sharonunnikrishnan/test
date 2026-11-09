<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>

<h1>Add Employee</h1>

<?php if (session()->has('errors')): ?>

    <ul>
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<form action="<?= site_url('employees') ?>" method="post">

    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>

    <br>

    <div>
        <label>Email</label>
        <input type="email" name="email">
    </div>

    <br>

    <div>
        <label>Phone</label>
        <input type="text" name="phone">
    </div>

    <br>

    <div>
        <label>Department</label>
        <input type="text" name="department">
    </div>

    <br>

    <div>
        <label>Status</label>

        <select name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

    <br>

    <button type="submit">Save Employee</button>

</form>

<br>

<a href="<?= site_url('employees') ?>">Back to Employees</a>

</body>
</html>