<script>
    // Upload image preview //
    function previewFile() {
        var preview = document.querySelector('.pre-img');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    };

    // Delete Confirm
    $('#delete-btn').on('click', function(){
        return confirm('Are you sure you want to delete?')
    })
</script>