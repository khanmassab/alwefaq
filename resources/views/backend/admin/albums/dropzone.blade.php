@section('styles')
    @parent
    <link rel="stylesheet" href="{{ mix('/vendor/libs/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="{{ mix('/vendor/libs/sweetalert2/sweetalert2.css') }}">
@endsection

@section('scripts')
    @parent
    <script src="{{ mix('/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ mix('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#dropzone-album-images').dropzone({
                parallelUploads: 1,
                maxFilesize: 50000,
                filesizeBase: 1000,
                addRemoveLinks: true,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                init: function () {
                    let albumId = $('#album_image_id').val();
                    thisDropzone = this;
                    $.get("{{ route('albumImages.getAlbumImages',$album->id) }}", function (data) {
                        if (data == null) {
                            return;
                        }
                        $.each(data, function (key, value) {
                            let mockFile = {name: (value).toString().replace('{{ asset('uploads/albumImages/') }}/', '')};
                            thisDropzone.emit("addedfile", mockFile);
                            thisDropzone.options.thumbnail.call(thisDropzone, mockFile, value);
                            // Make sure that there is no progress bar, etc...
                            thisDropzone.emit("complete", mockFile);
                        });
                    });
                },
                removedfile: function (file) {
                    let albumId = $('#album_image_id').val();
                    if (file.name != null) {
                        var name = file.name;
                    } else {
                        var name = file.upload.filename;
                    }
                    console.log(name)
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        url: '{{ route('albumImages.deleteImage') }}',
                        data: {filename: name, album_id: albumId},
                        success: function (data) {
                            Swal.fire({
                                title: "{{trans('app.Deleted!')}}",
                                text: "{{ trans('app.has been deleted.') }}",
                                type: "success",
                                confirmButtonText: "{{trans('app.success')}}"
                            });
                            console.log("File has been successfully removed!!");
                            var fileRef;
                            return (fileRef = file.previewElement) != null ?
                                fileRef.parentNode.removeChild(file.previewElement) : void 0;
                        },
                        error: function (e) {
                            Swal.fire({
                                title: "{{trans('app.error_message')}}",
                                text: "{{ trans('app.error_message') }}",
                                type: "error",
                                confirmButtonText: "{{trans('app.ok')}}"
                            });
                            console.log(e);
                        }
                    });
                },
                success: function (file, response) {
                    console.log(response.message);
                },
                error: function (file, response) {
                    return false;
                }
            });
        });
    </script>
@endsection

<div class="card mb-4">
    <h6 class="card-header">
        Upload Image : <p style="color: red">Max Upload File: <strong>{{ ini_get('upload_max_filesize') }}</strong></p>
    </h6>
    <div class="card-body">
        <form method="post" action="{{ route('albumImages.storeImage') }}" enctype="multipart/form-data" class="dropzone needsclick" id="dropzone-album-images">
            <input type="hidden" id="album_image_id" name="album_image_id" value="{{$album->id}}"/>
            {{ csrf_field() }}
            <div class="dz-message needsclick"> Drop files here or click to upload</div>
        </form>
    </div>
</div>
