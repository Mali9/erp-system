@extends('app')

@section('content')




    <section class="content" style="background-color:#dbc65d; width: 1000px;position: relative;left:150px">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <center> <h3 class="box-title">معلومات المؤسسات</h3></center>

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

                                <th>رقم المؤسسة</th>
                                <th>عنوان المؤسسة </th>
                                <th>وقت الحضور</th>
                                <th>وقت الانصراف</th>
                                <th>مندوب المؤسسة</th>
                                <th>تعديل</th>
                                <th>حذف       </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($foundatios as $f)
                                <tr>
                                    <td>{{ $f->name }}</td>
                                    <td>{{ $f->address }}</td>
                                    <td>{{ $f->coming_app }}</td>
                                    <td>{{ $f->leaving_app }}</td>
                                    <td>{{ $f->rep->name }}</td>




                                    <td>
                                        <a href="{{ url('/edit_found')."/".$f->foundation_id }}" class="btn btn-primary"> edit </a>

                                    </td>
                                    <td> <a href="{{ url('/delete_found')."/".$f->foundation_id  }}" class="btn btn-primary" style="background-color:red;">delete </a></td>
                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>


                            </tfoot>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <a href="{{ url('/add_found_form') }}" class="btn btn-primary" style="background-color:green;">اضافة مؤسسة جديد </a>

                <!-- /.box -->
            </div>
            <!-- /.col -->

            <!-- /.row -->
        </div>
    </section>
    <center>{{ $foundatios->links() }}</center>
    @if( Session::has('success'))
        <script>
            window.alert("{{ Session::get('success')  }}");
        </script>
        <center><h1 style="color: #ac2925;">{{ Session::get('success')  }}</h1> </center>    @endif
@endsection
