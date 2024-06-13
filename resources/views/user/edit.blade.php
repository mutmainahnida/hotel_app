@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">edit user</h4>
        </div>
        <div class="card-body">
            <form>

                <div class="form-group">
                    <label for="" class="text-capitalize">name</label>
                    <input type="text" name="nama" id="nama" value="{{$user->name}}" class="form-control">
                </div>

            </form>
        </div>
    </div>
@endsection