@extends('app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- // Meta-Tags -->
        <!-- Custom-Stylesheet-Links -->

    {!!Html::style('website/css/bootstrap.css')!!}<!-- Bootstrap -->

    {!!Html::style('website/css/font-awesome.css')!!} <!-- Font awesome -->

    {!!Html::style('website/css/lsb.css')!!}<!-- gallery -->

    {!!Html::style('website/css/JiSlider.css')!!}<!-- banne slider -->

    {!!Html::style('website/css/style7.css')!!}<!-- menu slider -->

    {!!Html::style('website/css/easy-responsive-tabs.css')!!}<!-- tabs -->
        <!-- tabs inner slider -->

    {!!Html::style('website/css/style.css')!!}
    {!!Html::style('website/css/owl.carousel.css')!!}


    <!-- //Custom-Stylesheet-Links -->
        <!--fonts-->
        <link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <!--//fonts-->
    </head>



    <center>
        <form  role="form" method="POST" action="{{ url('/add_captain_submit') }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group row">




                <div class="form-group row">

                    <div class="col-md-10">
                     اسم الكابتن   <input style="width:40%;" id="name" placeholder="captain name" type="text" class="text2{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus><br>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>



                <div class="form-group row">

                    <div class="col-md-10">
                     رقم التليفون   <input style="width:40%;" id="number" placeholder="bus_number" type="text" class="text2{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ old('number') }}" required autofocus><br>

                        @if ($errors->has('number'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-10">
                       رقم الجهاز    <input style="width:40%;" id="hw_number" placeholder="hw_number" type="text" class="text2{{ $errors->has('hw_number') ? ' is-invalid' : '' }}" name="hw_number" value="{{ old('hw_number') }}" required autofocus><br>

                        @if ($errors->has('hw_number'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('hw_number') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>






                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('اضافة') }}
                        </button>
                    </div>
                </div>
        </form>


    </center>
@endsection