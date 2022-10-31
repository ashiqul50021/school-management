@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">All Users</h4>
                            <div class="box-controls pull-right">
                                <a href="{{ route('user.create') }}" role="button" class="mx-3 btn btn-rounded btn-primary mb-5">add user</a>
                                <div class="lookup lookup-circle lookup-right">
                                    <input type="text" name="s">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>SL</th>
                                        <th>Role</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($users as $key => $user)
                                    <tr>

                                        <td><a href="javascript:void(0)">{{ $key+1 }}</a></td>
                                        <td>{{ $user->usertype }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('user.edit',$user->id) }}" role="button" class="btn btn-rounded btn-success mb-5">Edit</a>
                                            {{-- @method('delete') --}}
                                            <a href="{{ route('user.delete', $user->id) }}" role="button" class="btn btn-rounded btn-danger mb-5">Delete</a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
