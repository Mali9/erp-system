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
        <form  role="form" method="POST" action="{{ url('/add_found_submit') }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group row">




                <div class="form-group row">

                    <div class="col-md-10">
                        اسم المؤسسة  <input style="width:40%;" id="name" placeholder="name" type="text" class="text2{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus><br>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-10">
                        عنوان المؤسسة  <input style="width:40%;" id="address" placeholder="address" type="text" class="text2{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus><br>

                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-10">
                       وقت الحضور  <input style="width:40%;" id="coming_app" placeholder="coming_app" type="time" class="text2{{ $errors->has('coming_app') ? ' is-invalid' : '' }}" name="coming_app" value="{{ old('coming_app') }}" required autofocus><br>

                        @if ($errors->has('coming_app'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('coming_app') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>



                <div class="form-group row">

                    <div class="col-md-10">
                        وقت الانصراف  <input style="width:40%;" id="leaving_app" placeholder="leaving_app" type="time" class="text2{{ $errors->has('leaving_app') ? ' is-invalid' : '' }}" name="leaving_app" value="{{ old('leaving_app') }}" required autofocus><br>

                        @if ($errors->has('leaving_app'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('leaving_app') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>


               مندوب المؤسسة  <div class="form-group row" style="margin-left: 300px;">

                    <div class="col-md-10">
                        <div class="form-group col-lg-4 select">
                            {!! Form::select('rep_id', $rep ,['required','class'=>'form-control','placeholder'=>'rep name','style'=>'width:40%;']) !!}
                        </div>

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