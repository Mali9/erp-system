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
        <form  role="form" method="POST" action="{{ url('/add_col_submit') }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group row">




                <div class="form-group row">

                    <div class="col-md-10">
                        اسم نقطة التجمع  <input style="width:40%;" id="name" placeholder="name" type="text" class="text2{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus><br>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-10">
                       معاد التجمع  <input style="width:40%;" id="time" placeholder="time" type="time" class="text2{{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" value="{{ old('time') }}" required autofocus><br>

                        @if ($errors->has('time'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>

            </div>

            <div class="form-group row">

                <div class="col-md-10">
                    خط الطول  <input style="width:40%;" id="lang" placeholder="lang" type="text" class="text2{{ $errors->has('lang') ? ' is-invalid' : '' }}" name="lang" value="{{ old('lang') }}" required autofocus><br>

                    @if ($errors->has('lang'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lang') }}</strong>
                                    </span>
                    @endif

                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-10">
                    خط العرض  <input style="width:40%;" id="lat" placeholder="lat" type="text" class="text2{{ $errors->has('lat') ? ' is-invalid' : '' }}" name="lat" value="{{ old('lat') }}" required autofocus><br>

                    @if ($errors->has('lat'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lat') }}</strong>
                                    </span>
                    @endif

                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-10">
                  عنوان التجمع<input style="width:40%;" id="address" placeholder="address" type="text" class="text2{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus><br>

                    @if ($errors->has('address'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
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

        @if( Session::has('success'))
            {{ Session::get('success')  }}
        @endif
    </center>
@endsection