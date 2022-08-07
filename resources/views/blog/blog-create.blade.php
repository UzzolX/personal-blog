<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {

            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }

    </style>
</head>

<body>
    <div class="container">
        @if(Session::has('message'))
        <div>
            {{Session::get('message')}}
        </div>
        @endif
        <form action="{{route('blogs.store')}}" enctype="multipart/form-data" method="post">

            @csrf

            <div class="card-body">

                <div class="form-group">
                    <label>Blog Title</label>
                    <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                        value="{{ old('title') }}" placeholder="title" />
                    @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="content">Blog Content<span class="text-danger">*</span></label>
                    <textarea name="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                        value="{{ old('content') }}" rows="10"></textarea>
                    @if ($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group mb-1">
                    <label for="content">Blog image &nbsp;<span class="text-danger">(image size = 1920 x 1080
                            )</span></label>
                    <input type="file" title="click to image upload" name="image"
                        class="blogupimage form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                        value="{{ old('image') }}" />
                    @if ($errors->has('image'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>
