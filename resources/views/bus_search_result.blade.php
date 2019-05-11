@extends('app')

@section('content')




    <section class="content" style="background-color:#dbc65d; width: 1000px;position: relative;left:150px">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <center> <h3 class="box-title">نتائج البحث</h3></center>

                        <form action="{{ url("$url") }}" method="get">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search" style="width: 250px; margin-left: 20px;">
                            </div>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <button id="p" style=" margin-left: 20px;" type="submit"  class="btn btn-default">search</button>
                            Total record: <span id="total">{{ $total }}</span>
                        </form>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body" c>
                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>

                                <th>رقم الاتوبيس</th>
                                <th>اسم الكابتن</th>
                                <th>رقم الكابتن</th>

                                <th>تعديل</th>
                                <th>حذف       </th>
                            </tr>
                            </thead>
                            <tbody>
                                @if($res->count() > 0)
                            @foreach($res as $b)
                                <tr>
                                    <td>{{$b->bus_num }}</td>
                                    <td>{{$b->prof->name }}</td>
                                    <td>{{$b->prof->phone}}</td>
                                    <td>
                                        <a href="{{ url("/edit_bus")."/".$b->id }}" class="btn btn-primary"> edit </a>

                                    </td>
                                    <td> <a href="{{ url("/delete_bus")."/".$b->id }}" class="btn btn-primary" style="background-color:red;">delete </a></td>
                                </tr>
                            @endforeach
                                    @else
                                    <td colspan="5" align="center"><h3>No Data Found</h3></td>
                                    @endif
                            </tbody>

                            <tfoot>


                            </tfoot>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <a href="{{ url('/add_bus_form') }}" class="btn btn-primary" style="background-color:green;">اضافة اتوبيس جديد </a>

                <!-- /.box -->
            </div>
            <!-- /.col -->

            <!-- /.row -->
        </div>
    </section>

    @if( Session::has('success'))
        <script>
            window.alert("{{ Session::get('success')  }}");
        </script>
        <center><h1 style="color: #ac2925;">{{ Session::get('success')  }}</h1> </center>    @endif
@endsection
