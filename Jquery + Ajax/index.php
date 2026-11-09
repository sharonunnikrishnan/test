<table border="1">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody id="employeeTableBody">

        <?php foreach ($employees as $employee): ?>

            <tr>
                <td>
                    <?php if (!empty($employee['profile_image'])): ?>
                        <img
                            src="<?= base_url('uploads/employees/' . $employee['profile_image']) ?>"
                            width="80"
                            height="80"
                        >
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>

                <td><?= esc($employee['name']) ?></td>
                <td><?= esc($employee['email']) ?></td>
                <td><?= esc($employee['phone']) ?></td>
                <td><?= esc($employee['department']) ?></td>
                <td><?= esc($employee['status']) ?></td>

                <td>
                    <!-- your existing Edit/Delete buttons -->
                </td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>



<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<script>

$(document).ready(function () {

    $('#searchEmployee').on('keyup', function () {

        let keyword = $(this).val();

        $.ajax({
            url: "<?= site_url('employees/search') ?>",
            type: "GET",
            data: {
                q: keyword
            },
            success: function (employees) {

                let html = '';

                employees.forEach(function (employee) {

                    html += `
                        <tr>
                            <td>
                                ${
                                    employee.profile_image
                                        ? `<img src="<?= base_url('uploads/employees/') ?>${employee.profile_image}" width="80" height="80">`
                                        : 'No Image'
                                }
                            </td>

                            <td>${employee.name}</td>
                            <td>${employee.email}</td>
                            <td>${employee.phone}</td>
                            <td>${employee.department}</td>
                            <td>${employee.status}</td>

                            <td>
                                <a href="<?= site_url('employees/') ?>${employee.id}/edit">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    `;
                });

                $('#employeeTableBody').html(html);
            }
        });

    });

});

</script>