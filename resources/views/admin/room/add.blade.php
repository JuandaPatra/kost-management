@extends('layouts.app')
@section('title')
Category Add
@endsection
@section('breadcrumbs')
{{-- {{ Breadcrumbs::render('add_category') }} --}}
@endsection
@section('content')
<div class="row">
    <div class="col-md-10">
        <form action="{{route('room.rentedSend', $id)}}" method="POST">
            @csrf
            <div class="card mb-4">
                <h5 class="card-header">Tambah Biodata Penyewa</h5>
                <div class="card-body">
                    <!-- title -->
                    <div class="mb-3">
                        <label for="input_post_title" class="form-label">Nama</label>
                        <input id="input_post_title" name="name" type="text" placeholder="" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <!-- address -->
                    <div class="mb-3">
                        <label for="input_post_title" class="form-label">No. Telephone / WA</label>
                        <input id="input_post_title" name="telephone" type="number" placeholder="" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" />
                        @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- No. KTP -->
                    <div class="mb-3">
                        <label for="input_post_title" class="form-label">No. KTP</label>
                        <input id="input_post_title" name="NIK" type="number" placeholder="" class="form-control @error('NIK') is-invalid @enderror" name="NIK" value="{{ old('NIK') }}" />
                        @error('NIK')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="input_post_title" class="form-label">Alamat</label>
                        <input id="input_post_title" name="address" type="text" placeholder="" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" />
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- pekerjaan -->
                    <div class="mb-3">
                        <label for="select_post_status" class="form-label">Pekerjaan</label>
                        <select id="select_post_status" name="occupation" class="form-select @error('occupation') is-invalid @enderror">
                            <option value="">Please Select ..</option>
                            @foreach ($jobs as $key =>$value)
                            <option value="{{ $key }}" {{ old('occupation') == $key ? "selected" : null }}> {{ $value }}</option>
                            @endforeach

                        </select>
                        @error('lantai')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- pekerjaan -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="select_post_status" class="form-label">Tanggal Masuk</label>
                                <input placeholder="masukkan tanggal Awal" type="text" class="form-control datepicker" name="tgl_masuk">
                                @error('lantai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="select_post_status" class="form-label">Tanggal Keluar</label>
                                <input placeholder="masukkan tanggal Awal" type="text" class="form-control datepicker" name="tgl_keluar">
                                @error('lantai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="room_id" value="{{$id}}">

                    <a class="btn btn-danger px-4" href=""><i class='bx bx-left-arrow-alt'></i>Back</a>
                    <button type="submit" class="btn btn-success px-4"><i class="menu-icon bx bx-save"></i>Save</button>


                </div>
        </form>
    </div>
</div>
@endsection
@push('javascript-external')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('vendor/tinymce5/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('vendor/tinymce5/tinymce.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@endpush
@push('javascript-internal')
<script>
    $(document).ready(function() {
        $("#input_post_title").change(function(event) {
            $("#input_post_slug").val(
                event.target.value
                .trim()
                .toLowerCase()
                .replace(/[^a-z\d-]/gi, "-")
                .replace(/-+/g, "-")
                .replace(/^-|-$/g, "")
            );
        });
        // event : input thumbnail with file manager and description
        $('#button_post_thumbnail').filemanager('image');
        $('#button_post_image').filemanager('image');
        // event :  description

        $('.datepicker').datepicker();
        // tinymce for content
        $("#input_post_content").tinymce({
            relative_urls: false,
            language: "en",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern",
            ],
            forced_root_block: '',
            toolbar1: "fullscreen preview",
            toolbar2: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document
                    .getElementsByTagName('body')[0].clientWidth;
                let y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                let cmsURL = "" + '?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }
                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        });

        $("#btn-add-post-images").click(function() {
            var hmtl = $(".clone").html();
            $(".increment").after(hmtl);
        });
        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").remove();
        });
    });
    $(function() {
        $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy'
        });
    });
</script>
@endpush