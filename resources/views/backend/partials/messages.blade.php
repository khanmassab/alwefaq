<script type="text/javascript">
    @if(isset ($errors) && count($errors) > 0)
    var positionClass = (($('body').attr('dir') === 'rtl') ? 'toast-top-left' : 'toast-top-right');
    @foreach($errors->all() as $error)
            $(function () {
                var msg = '{{ $error }}';
                var title = '{{ trans('app.error_message') }}';
                var type = 'error';
                toastr[type](msg, title, {
                    positionClass: positionClass,
                    closeButton: true,
                    progressBar: true,
                    preventDuplicates: true,
                    newestOnTop: true,
                    rtl: $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
                });
            });
        @endforeach
    @endif
    @if(Session::get('success', false))
        var positionClass = (($('body').attr('dir') === 'rtl') ? 'toast-top-left' : 'toast-top-right');
        <?php $data = Session::get('success'); ?>
        @if (is_array($data))
            @foreach ($data as $msg)
                $(function () {
                    var msg = '{{ $msg }}';
                    var title = '{{ trans('app.success_message') }}';
                    var type = 'success';
                    toastr[type](msg, title, {
                        positionClass: positionClass,
                        closeButton: true,
                        progressBar: true,
                        preventDuplicates: true,
                        newestOnTop: true,
                        rtl: $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
                    });
                });
            @endforeach
        @else
            $(function () {
                var msg = '{{ $data }}';
                var title = '{{ trans('app.success_message') }}';
                var type = 'success';
                toastr[type](msg, title, {
                    positionClass: positionClass,
                    closeButton: true,
                    progressBar: true,
                    preventDuplicates: true,
                    newestOnTop: true,
                    rtl: $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
                });
            });
        @endif
    @endif
</script>
