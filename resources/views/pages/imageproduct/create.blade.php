
@extends('layouts.app')

@section('content')
<div class="container">


    <p class=" jumbotron text-center">

            Product Name >>
                @foreach ($product as $item)
                {{ $item->name }}
            @endforeach

    </p>
    <form method="post" action="{{ route('images.store',$id) }}" enctype="multipart/form-data"
                  class="dropzone" id="dropzone">
    @csrf
    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
</form>
{{-- <div>
    <form action="{{ route('images.store',$id) }}"  method="post" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="file">Upload Product  Image</label>
            <input id="my-input" class="form-control-file" type="file" name="file" multiple >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div> --}}
<script type="text/javascript">
    Dropzone.options.dropzone =
     {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file)
        {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                type: 'POST',
                url: '{{ url("image/delete") }}',
                data: {filename: name},
                success: function (data){
                    console.log("File has been successfully removed!!");
                    alert("File has been successfully removed!!")
                },
                error: function(e) {
                    console.log(e);
                    alert(e)
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        success: function(file, response)
        {
            console.log(response);
        },
        error: function(file, response)
        {
           return false;
        }
};
</script>
@stop

