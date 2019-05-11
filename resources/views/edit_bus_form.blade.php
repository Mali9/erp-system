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
        <form  role="form" method="POST" action="{{ url('/edit_bus_submit')."/".$book->id }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group row">




                <div class="form-group row">

                    <div class="col-md-10">
                        رقم الاتوبيس   <input style="width:40%;" id="number" placeholder="bus_number" type="text" class="text2{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ $book->bus_num }}" required autofocus><br>

                        @if ($errors->has('number'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>



                اسم الكابتن   <div class="form-group row" style="margin-left: 300px;">

                    <div class="col-md-10">
                        <div class="form-group col-lg-4 select">
                            {!! Form::select('cap_id', $captains ,['required','class'=>'form-control','placeholder'=>'captain name','style'=>'width:40%;']) !!}
                        </div>

                    </div>
                </div>






                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('تعديل') }}
                        </button>
                    </div>
                </div>
        </form>


    </center>
@endsection