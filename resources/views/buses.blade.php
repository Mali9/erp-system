@extends('app')

@section('content')

<h1>All buses</h1>
    <center>
        <form class="navbar-form navbar-left" action="/action_page.php">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">search</button>
        </form>
        @foreach ($book as $b)
            {{ $b->name }}<br>
            {{ $b->prof->name }}<br>


        @endforeach


    </center>
@endsection