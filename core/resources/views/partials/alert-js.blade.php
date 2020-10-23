
@if (session('success'))
    <script>
        $(document).ready(function () {
            swal("Success!", "{{ __(session('success')) }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script>
        $(document).ready(function () {
            swal("Sorry!", "{{__(session('alert'))}}", "error");
        });
    </script>
@endif