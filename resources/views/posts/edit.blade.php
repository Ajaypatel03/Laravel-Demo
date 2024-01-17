<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>

    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <h3 class="text-center">Edit Posts</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('alert-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ Session::get('alert-success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{--  <form method="post" action=" {{ route('posts.store') }} "style="margin-top : 35px" id="form">  --}}
            <form method="post" action=" {{ route('posts.update' ,$post->id ) }} "style="margin-top : 35px" id="form">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="title"
                        value="{{ old('title', $post->title) }}">
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control" placeholder="enter text here....">{{ old('description', $post->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Published</label>
                    <select name="is_published" class="form-control">
                        <option value="" disabled selected>Choose Option</option>
                        <option value="1" @selected(old('is_published', $post->is_published) == 1)>Yes</option>
                        <option value="0" @selected(old('is_published', $post->is_published) == 0)>No</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Active</label>
                    <select name="is_active" class="form-control">
                        <option value="" disabled selected>Choose Option</option>
                        <option value="1" @selected(old('is_active', $post->is_active) == 1)>Yes</option>
                        <option value="0" @selected(old('is_active', $post->is_active) == 0)>No</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script>
        $('#form').parsley();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
