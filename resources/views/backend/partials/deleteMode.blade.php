@section('styles')
    @parent
    <link rel="stylesheet" href="{{ mix('/vendor/libs/sweetalert2/sweetalert2.css') }}">
@endsection

<script src="{{ mix('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script type="text/javascript">
    $(document).on('click', '#deleteButton', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        Swal.fire({
            title: "{{ trans('app.Are you sure?') }}",
            text: "{{ trans('app.You will not be able to recover this!') }}",
            type: "warning",
            showCancelButton: !0,
            confirmButton: 'btn btn-danger btn-lg',
            cancelButton: 'btn btn-default btn-lg',
            confirmButtonText: "{{ trans('app.Yes, delete it!') }}",
            cancelButtonText: "{{ trans('app.close!') }}",
            html: !1,
            preConfirm: function (e) {
                return new Promise(function (e) {
                    setTimeout(function () {
                        e()
                    }, 50)
                })
            }
        }).then(function (e) {
            if (e.value) {
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    url: "{{ route($routeName) }}",
                    data: {id: id},
                    success: function (data) {
                        Swal.fire({
                            title: "{{trans('app.Deleted!')}}",
                            text: "{{ trans('app.has been deleted.') }}",
                            type: "success",
                            confirmButtonText: "{{trans('app.success')}}"
                        }).then(function (e) {
                            window.location.href = '';
                        });
                    }
                });
            } else {
                Swal.fire({title: "{{trans('app.cancelled')}}", text: "{{trans('app.delete_canceled')}}", type: "error", confirmButtonText: "{{trans('app.close')}}"})
            }
        })
    });
</script>
