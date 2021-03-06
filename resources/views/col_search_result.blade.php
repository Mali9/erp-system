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

                                <th>اسم النقطة</th>
                                <th>معاد التجمع </th>
                                <th>خط الطول</th>
                                <th>خط العرض </th>
                                <th>العنوان</th>



                                <th>تعديل</th>
                                <th>حذف       </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($res->count() > 0)
                            @foreach($res as $c)
                                <tr>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->time }}</td>
                                    <td>{{ $c->lang }}</td>
                                    <td>{{ $c->lat }}</td>
                                    <td>{{ $c->address }}</td>

                                    <td>


                                        <a href="{{ url('/edit_col')."/".$c->id }}" class="btn btn-primary"> edit </a>

                                    </td>
                                    <td> <a href="{{ url('/delete_col')."/".$c->id  }}" class="btn btn-primary" style="background-color:red;">delete </a></td>
                                </tr>

                            @endforeach
                            @else
                                <td colspan="7" align="center"><h3>No Data Found</h3></td>
                            @endif
                            </tbody>

                            <tfoot>


                            </tfoot>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <a href="{{ url('/add_col_form') }}" class="btn btn-primary" style="background-color:green;">اضافة نقطة تجمع  جديد </a>

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
