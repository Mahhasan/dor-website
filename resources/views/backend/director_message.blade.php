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
            <h5>Director Message</h5>
            @if(isset($directorMessage))
            <h6>Edit Record</h6>
            <form method="POST" action="{{ route('director-message.update', $directorMessage->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @else
                <h6>Create New Record</h6>
            <form method="POST" action="{{ route('director-message.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row mt-5">
                    <div class="input-container col-sm-6 mb-4">
                        <input type="text" class="input" id="title" name="title" value="{{ old('title', isset($directorMessage) ? $directorMessage->title : '') }}" required placeholder=" "/>
                        <div class="cut"></div>
                        <label for="title" class="placeholder">Title</label>
                    </div>
                    <div class="input-container col-sm-6 mb-4">
                        <input type="file" class="form-control border-0" id="picture" name="picture" accept="image/*" {{ isset($directorMessage) ? '' : 'required' }}>
                        @if(isset($directorMessage) && $directorMessage->picture)
                            <!-- <a href="{{ asset('uploads/director_message/' . $directorMessage->picture) }}" target="_blank" class="float-right">Click to see existing picture</a> -->
                            <div class="mr-2 mt-3 float-right">
                                <img src="{{ asset('uploads/director_message/' . $directorMessage->picture) }}" alt="Image" height="auto" width="200">
                            </div>
                        @endif   
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-4">
                        <textarea id="file-picker" name="message" value="{{ old('message', isset($directorMessage) ? $directorMessage->message : '') }}">{{ old('message', isset($directorMessage) ? $directorMessage->message : '') }}</textarea>
                    </div>
                </div>
                @if(isset($directorMessage))
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('director-message.index') }}" class="btn btn-danger">Cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
    </div>

    <div class="row">
        <div class="mx-auto pt-5 pb-5">
            <h5 class="text-center mb-5">Director Message</h5>
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($directorMessages as $key=>$directorMessage)
                            <tr>
                                <td>{{ $directorMessage->title }}</td>
                                <td>
                                    @if($directorMessage->picture)
                                        <img src="{{ asset('uploads/director_message/' . $directorMessage->picture) }}" alt="{{ $directorMessage->title }} Image" width="100">
                                    @else
                                        No Image Available
                                    @endif
                                </td>
                                
                                <td>{!! $directorMessage->message !!}</td>
                                <td>
                                    <a href="{{ route('director-message.edit', $directorMessage->id) }}" class="btn text-primary"><i class="fas fa-edit fa-sm"></i></a>
                                    <form action="{{ route('director-message.destroy', $directorMessage->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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