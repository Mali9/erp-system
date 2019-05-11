@extends('app')

@section('content')




    <section class="content" style="background-color:#dbc65d; width: 1000px;position: relative;left:150px">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <center><h3 class="box-title">معلومات المشتركين</h3></center>




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
                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>

                                <th>اسم المشترك</th>
                                <th>تليفون المشترك </th>
                                <th>عنوان المشترك</th>
                                <th>حالة الاشتراك</th>
                                <th>رقم الكارت</th>
                                <th>النقطة المختارة</th>
                                <th>المؤسسة التابع لها</th>
                                <th>تفيل الاشتراك</th>
                                <th>تعديل</th>
                                <th>حذف       </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $u)
                                <tr>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->phone }}</td>
                                    <td>{{ $u->address }}</td>
                                    <td>

                                    @if ($u->active == FALSE)
                                        <p style="color: red"> غير مشترك</p>
                                        @else
                                            <p style="color: green">  مشترك</p>
                                     @endif
                                    </td>
                                    <td>{{ $u->card_id }}</td>

                                    <td>{{ $u->col_point->name }}</td>
                                    <td>{{ $u->f->name }}</td>


                                    @if ($u->active == FALSE)
                                    <td>
                                        <a href="{{ url('/active_user')."/".$u->person_id }}" class="btn btn-success"> active </a>

                                    </td>
                                        @else


                                    <td>
                                        <a href="{{ url('/disactive_user')."/".$u->person_id }}" class="btn btn-danger"> dis active </a>

                                    </td>
                                    @endif
                                    <td>
                                        <a href="{{ url('/edit_user')."/".$u->person_id }}" class="btn btn-primary"> edit </a>

                                    </td>
                                    <td> <a href="{{ url('/delete_user')."/".$u->person_id  }}" class="btn btn-primary" style="background-color:red;">delete </a></td>
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
                <a href="{{ url('/add_found_form') }}" class="btn btn-primary" style="background-color:green;">اضافة مستخدم جديد </a>

                <!-- /.box -->
            </div>
            <!-- /.col -->

            <!-- /.row -->
        </div>
    </section>
    <center>{{ $users->links() }}</center>
    @if( Session::has('success'))
        <script>
            window.alert("{{ Session::get('success')  }}");
        </script>
        <center><h1 style="color: #ac2925;">{{ Session::get('success')  }}</h1> </center>
    @endif
@endsection

