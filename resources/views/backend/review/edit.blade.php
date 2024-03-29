@extends('backend.layouts.master')

@section('title','Review Edit')

@section('main-content')
<div class="card">
  <h5 class="card-header">แก้ไขรีวิว</h5>
  <div class="card-body">
    <form action="{{route('review.update',$review->id)}}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">เขียนรีวิวโดย:</label>
        <input type="text" disabled class="form-control" value="{{$review->user_info->name}}">
      </div>
      <div class="form-group">
        <label for="review">ข้อความ</label>
      <textarea name="review" id="" cols="20" rows="10" class="form-control">{{$review->review}}</textarea>
      </div>
      <div class="form-group">
        <label for="status">สถานะ :</label>
        <select name="status" id="" class="form-control">
          <option value="">--เลือกสถานะ--</option>
          <option value="active" {{(($review->status=='active')? 'selected' : '')}}>Active</option>
          <option value="inactive" {{(($review->status=='inactive')? 'selected' : '')}}>Inactive</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">อัปเดต</button>
    </form>
  </div>
</div><!-- เศรษฐ์ เกิดแสง 062-5952829 -->
@endsection

@push('styles')
<style>
    .order-info,.shipping-info{
        background:#ECECEC;
        padding:20px;
    }
    .order-info h4,.shipping-info h4{
        text-decoration: underline;
    }
</style>
@endpush