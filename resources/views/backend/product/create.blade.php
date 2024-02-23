@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">เพิ่มสินค้า</h5>
    <div class="card-body">
      <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">ชื่อ <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{old('title')}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">อธิบาย <span class="text-danger">*</span></label>
          <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">รายละเอียด</label>
          <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>


        <div class="form-group">
          <label for="is_featured">Is Featured</label><br>
          <input type="checkbox" name='is_featured' id='is_featured' value='1' checked> Yes                        
        </div>
              {{-- {{$categories}} --}}

        <div class="form-group">
          <label for="cat_id">หมวดหมู่ <span class="text-danger">*</span></label>
          <select name="cat_id" id="cat_id" class="form-control">
              <option value="">--เลือกหมวดหมู่--</option>
              @foreach($categories as $key=>$cat_data)
                  <option value='{{$cat_data->id}}'>{{$cat_data->title}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group d-none" id="child_cat_div">
          <label for="child_cat_id">หมวดหมู่รอง</label>
          <select name="child_cat_id" id="child_cat_id" class="form-control">
              <option value="">--เลือกหมวดหมู่รอง--</option>
              {{-- @foreach($parent_cats as $key=>$parent_cat)
                  <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>
              @endforeach --}}
          </select>
        </div>

        <div class="form-group">
          <label for="price" class="col-form-label">ราคา($) <span class="text-danger">*</span></label>
          <input id="price" type="number" name="price" placeholder="Enter price"  value="{{old('price')}}" class="form-control">
          @error('price')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="discount" class="col-form-label">การลดราคา(%)</label>
          <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount"  value="{{old('discount')}}" class="form-control">
          @error('discount')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="size">ขนาด</label>
          <select name="size[]" class="form-control selectpicker"  multiple data-live-search="true">
              <option value="">--เลือกขนาด--</option>
              <option value="S">Small (1-4 cm.)</option>
              <option value="M">Medium (4-6 cm.)</option>
              <option value="L">Large (6-9 cm.)</option>
              <option value="7cm">7 cm</option>
              <option value="8cm">8 cm</option>
              <option value="9cm">9 cm</option>
              <option value="10cm">10 cm</option>
              <option value="11cm">11 cm</option>
              <option value="12cm">12 cm</option>
              <option value="13cm">13 cm</option>



          </select>
        </div>

        <div class="form-group">
          <label for="brand_id">แบรนด์</label>
          {{-- {{$brands}} --}}

          <select name="brand_id" class="form-control">
              <option value="">--เลือกแบรนด์--</option>
             @foreach($brands as $brand)
              <option value="{{$brand->id}}">{{$brand->title}}</option>
             @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="condition">ประเภทการขาย</label>
          <select name="condition" class="form-control">
              <option value="">--เลือก--</option>
              <option value="default">ปกติ</option>
              <option value="new">ใหม่</option>
              <option value="hot">ขายดี</option>
          </select>
        </div>

        <div class="form-group">
          <label for="stock">จำนวน <span class="text-danger">*</span></label>
          <input id="quantity" type="number" name="stock" min="0" placeholder="Enter quantity"  value="{{old('stock')}}" class="form-control">
          @error('stock')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">รูป <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  {{--<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-secondary text-white">
                  <i class="fa fa-picture-o"></i> เลือก
                  </a> --}}
                  <input  name="photo" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="file">
                  
              </span>
          {{--<input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">--}}
                  
        </div>
        {{--<div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>--}}
        
        <div class="form-group">
          <label for="status" class="col-form-label">สถานะ <span class="text-danger">*</span></label>
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

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
    // $('select').selectpicker();

</script>

<script>
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id
        },
        type:"POST",
        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          // console.log(response);
          var html_option="<option value=''>----Select sub category----</option>"
          if(response.status){
            var data=response.data;
            // alert(data);
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
            }
          }
          else{
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    }
    else{
    }
  })
</script>
@endpush