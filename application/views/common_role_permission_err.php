
<!-- common Rolepermission error -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    setTimeout(function() {
        Swal.fire({
            title: 'Permission ?..',
            text: 'You do not have permission to perform this page.',
            icon: 'error',
            confirmButtonText: 'Okay'
        });
    }, 4000); // 5000 milliseconds = 4 seconds
</script>
