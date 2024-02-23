@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">เพิ่มโหมดหมู่โพส</h5>
    <div class="card-body">
      <form method="post" action="{{route('post-category.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">ชื่อ</label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">สถานะ</label>
          <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">รีเซ็ท</button>
           <button class="btn btn-success" type="submit">สร้างข้อมูล</button>
        </div>
      </form>
    </div>
</div>

@endsection
