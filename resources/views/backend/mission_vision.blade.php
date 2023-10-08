@extends('backend.layouts.master')
@section('content')
<div class="container">
    @if (Session::has('success'))
        <div class="alert alert-success mt-3">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger mt-3">
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="row bg-aliceblue">
        <div class="custom-form col-md-10 mx-auto pt-5 pb-5">
            <h5>Mission & Vision</h5>
            @if(isset($missionVision))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('mission-vision.update', $missionVision->id) }}">
                @method('PATCH')
            @else
            <h6>Create New Record</h6>
            <form method="POST" action="{{ route('mission-vision.store') }}">
            @endif
                @csrf
                <div class="row mt-5">
                    <div class="form-group mb-4">
                        <textarea id="file-picker" name="mission" value="{{ old('mission', isset($missionVision) ? $missionVision->mission : '') }}">{{ old('mission', isset($missionVision) ? $missionVision->mission : '') }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-4">
                        <textarea id="file-picker" name="vision" value="{{ old('vision', isset($missionVision) ? $missionVision->vision : '') }}">{{ old('vision', isset($missionVision) ? $missionVision->vision : '') }}</textarea>
                    </div>
                </div>
                @if(isset($missionVision))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('mission-vision.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Mission & vision</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mission</th>
                            <th>Vision</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($missionVisions))
                        @foreach($missionVisions as $key=>$missionVision)
                            <tr>
                                <td>{{ $missionVision->mission }}</td>
                                <td>{{ $missionVision->vision }}</td>
                                <td>
                                    <a href="{{ route('mission-vision.edit', $missionVision->id) }}" class="btn text-primary" title="Edit this information"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('mission-vision.destroy', $missionVision->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete this information"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
  tinymce.init({
    selector: 'textarea#file-picker',
    plugins: 'code imagetools ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    // images_upload_url: '/events', // Specify the image upload route
    image_title: true,
    automatic_uploads: true, // Enable automatic image uploads
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function () {
            /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };

    input.click();
  },
  });
</script>
@endsection