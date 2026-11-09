<form
    id="employeeForm"
    action="<?= site_url('employees') ?>"
    method="post"
    enctype="multipart/form-data"
>


<script>

$('#employeeForm').on('submit', function (e) {

    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,

        success: function (response) {

            if (response.status) {

                alert(response.message);

                $('#employeeForm')[0].reset();

            } else {

                alert(response.message);

            }

        },

        error: function (xhr) {

            console.log(xhr.responseText);

            alert('Something went wrong.');

        }
    });

});

</script>


return $this->response->setJSON([
    'status' => true,
    'message' => 'Employee added successfully'
]);