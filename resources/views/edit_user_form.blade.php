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
        <form  role="form" method="POST" action="{{ url('/edit_user_submit').'/'.$u->person_id }}" enctype="multipart/form-data">

            @csrf

            <div class="form-group row">




                <div class="form-group row">

                    <div class="col-md-10">
                        اسم المشترك  <input style="width:40%;" id="name" placeholder="name" type="text" class="text2{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $u->name }}" required autofocus><br>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-10">
                        عنوان المشترك  <input style="width:40%;" id="address" placeholder="address" type="text" class="text2{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $u->address }}" required autofocus><br>

                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif

                    </div>
                </div>

                <div class="form-group row">

                <div class="col-md-10">
                    تليفون المشترك  <input style="width:40%;" id="phone" placeholder="phone" type="text" class="text2{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{  $u->phone }}" required autofocus><br>

                    @if ($errors->has('phone'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                    @endif

                </div>
            </div>



            </div>

            <div class="form-group row">

                <div class="col-md-10">
               رقم الكارت  <input style="width:40%;" id="card_id" placeholder="card_id" type="text" class="text2{{ $errors->has('card_id') ? ' is-invalid' : '' }}" name="card_id" value="{{  $u->card_id }}" required autofocus><br>

                    @if ($errors->has('card_id'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('card_id') }}</strong>
                                    </span>
                    @endif

                </div>
            </div>



            </div>


                 المؤسسةالتابع لها  <div class="form-group row" style="margin-left: 300px;">

                    <div class="col-md-10">
                        <div class="form-group col-lg-4 select">
                            {!! Form::select('foundation_id', $found ,['required','class'=>'form-control','placeholder'=>'rep name','style'=>'width:40%;']) !!}
                        </div>

                    </div>
                </div>


            نقطة التجمع المختارة  <div class="form-group row" style="margin-left: 300px;">

                <div class="col-md-10">
                    <div class="form-group col-lg-4 select">
                        {!! Form::select('point_id', $col ,['required','class'=>'form-control','placeholder'=>'rep name','style'=>'width:40%;']) !!}
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
        @if( Session::has('success'))
            {{ Session::get('success')  }}
        @endif

    </center>
@endsection