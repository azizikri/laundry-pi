<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    showSwal = function(text, state) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-start',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        Toast.fire({
            icon: state,
            title: text
        })
    }

    @if (session('success'))
        showSwal("{{ session('success') }}", "success")
    @endif

    @if (session('error'))
        showSwal("{{ session('error') }}", "error")
    @endif
</script>
