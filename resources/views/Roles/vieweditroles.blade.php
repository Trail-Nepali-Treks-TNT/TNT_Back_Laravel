@extends('Layout._Layout')
@section('role-content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>Edit Roles</h4>
            </div>
            <div class="card-body">
                <form action="/roles/{{$role->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="role_name">Role Name</label>
                        <input type="text" class="form-control" id="role_name" name="role_name" 
                        placeholder="Enter role name" value="{{$role->role_name}}">
                    </div>

                    <div class="form-group">
                        <input type="radio" class="form-check-input" name="status" id="active" value="active" autocomplete="off" checked>
                        <label class="form-check-label" for="active">ACTIVE</label>
                        <input type="radio" class="form-check-input" name="status" value="inactive" id="inactive" autocomplete="off">
                        <label class="form-check-label" for="inactive">INACTIVE</label>

                    </div>
                    <button type="submit" class="btn btn-primary">SAVE</button>
                    <a href="/roles"> <button type="button" class="btn btn-secondary">BACK</button></a>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection