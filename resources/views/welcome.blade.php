<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        /* Add a gray background color with some padding */
        body {
            font-family: Arial;
            padding: 20px;
            background: #f1f1f1;
        }

        /* Header/Blog Title */
        .header {
            padding: 30px;
            font-size: 40px;
            text-align: center;
            background: rgb(255, 255, 255);
        }

        /* Create two unequal columns that floats next to each other */
        /* Left column */
        .leftcolumn {
            float: left;
            width: 75%;
        }

        /* Right column */
        .rightcolumn {
            float: left;
            width: 25%;
            padding-left: 20px;
        }

        /* Fake image */
        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }

        /* Add a card effect for articles */
        .card {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Footer */
        .footer {
            padding: 20px;
            text-align: center;
            background: #ddd;
            margin-top: 20px;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 800px) {

            .leftcolumn,
            .rightcolumn {
                width: 100%;
                padding: 0;
            }
        }

    </style>
</head>

<body>

    <div class="header">
        <h2>Maria's Personal Blog</h2>
        @if (Route::has('login'))
        <div>
            @auth
            <a href="{{ url('/home') }}" >Dashboard</a>
            @else
            <a href="{{ route('login') }}" >Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                >Register</a>
            @endif
            @endauth
        </div>
        @endif
    </div>

    <div class="row">
        <div>

            @foreach($blog as $row)
            <div class="card">
                <h2>  {{ $row->title }}   </h2>
                <img style="height:250px;" src="{{ URL::to('/') }}/images/blogs/{{ $row->image }}"/>
                <p> {{ $row->content }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <div class="footer">
        <h2>Footer</h2>
    </div>

</body>

</html>
