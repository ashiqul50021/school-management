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
                                <a href="{{ route('user.view') }}" role="button" class="mx-3 btn btn-rounded btn-primary mb-5">view user</a>
                                <div class="lookup lookup-circle lookup-right">
                                    <input type="text" name="s">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="col mt-5">
                                <form action="{{ route('user.update',$users->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group mt-5">
                                                <h5>User Name: <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input value="{{ $users->name }}" type="text" name="name" class="form-control" required=""
                                                        data-validation-required-message="This field is required">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>User Email: <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input value="{{ $users->email }}" type="email" name="email" class="form-control" required=""
                                                        data-validation-required-message="This field is required">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Password:<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input value="{{ $users->password }}" type="password" name="password" class="form-control"
                                                        required=""
                                                        data-validation-required-message="This field is required"
                                                        aria-invalid="false">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            
                                            {{-- <div class="form-group">
                                              <h5>Profile Photo: <span class="text-danger">*</span></h5>
                                              <div class="controls">
                                                  <input type="file" name="image" id="image" class="form-control" required=""> <div class="help-block"></div></div>
                                          </div> --}}
                                            <div class="form-group">
                                                <h5>Role: <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="usertype" id="select" required=""
                                                        class="form-control">
                                                        <option value="">select user role</option>
                                                        <option value="admin" {{ $users->usertype == 'admin' ? 'selected':'' }}>admin</option>
                                                        <option value="user" {{ $users->usertype == 'user' ? 'selected':'' }}>user</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="text-xs-right">
                                                <button type="submit" class="btn btn-rounded btn-info mb-4">update</button>
                                            </div>
                                </form>
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
