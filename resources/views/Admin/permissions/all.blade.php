@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>{{__('messages.PERMISSIONS')}}</h2>
            <div class="btn-group">
                <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-danger">{{__('messages.CREATE_PERMISSION')}}</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>{{__('messages.PERMISSION_NAME')}}</th>
                    <th>{{__('messages.DESCRIPTION')}}</th>
                    <th>{{__('messages.SETTING')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->label }}</td>
                        <td>
                            <form action="{{ route('permissions.destroy'  , ['id' => $permission->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('permissions.edit' , ['id' => $permission->id]) }}"  class="btn btn-primary">ویرایش{{__('messages.EDIT')}}</a>
                                    <button type="submit" class="btn btn-danger">{{__('messages.DELETE')}}</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $permissions->render() !!}
        </div>
    </div>
@endsection