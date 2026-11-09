<script>

$('#employeeEditForm').on('submit', function (e) {

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


if ($model->update($id, $data)) {

    return $this->response->setJSON([
        'status'  => true,
        'message' => 'Employee updated successfully'
    ]);
}

return $this->response->setJSON([
    'status'  => false,
    'message' => 'Failed to update employee'
]);