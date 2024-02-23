@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
<h5 class="card-header">หมายเลขคำสั่งซื้อ       <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
  </h5>
  <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
            <th>#</th>
            <th>หมายเลข</th>
            <th>ชื่อ</th>
            <th>Email</th>
            <th>จำนวน</th>
            <th>ภาษี</th>
            <th>ราคา</th>
            <th>สถานะ</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->first_name}} {{$order->last_name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>
            <td>${{$order->shipping->price}}</td>
            <td>${{number_format($order->total_amount,2)}}</td>
            <td>
                @if($order->status=='new')
                  <span class="badge badge-primary">ใหม่</span>
                @elseif($order->status=='process')
                  <span class="badge badge-warning">กำลังดำเนินการ</span>
                @elseif($order->status=='delivered')
                  <span class="badge badge-success">จัดส่งสำเร็จ</span>
                @else
                  <span class="badge badge-danger">{{$order->status}}</span>
                @endif
            </td>
            <td>
                <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                  @csrf
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>

        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">ข้อมูลการสั่งซื้อ</h4>
              <table class="table">
                    <tr class="">
                        <td>หมายเลขคำสั่งซื้อ</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>วันที่</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>จำนวน</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>สถานะ</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                        <td>ค่าขนส่ง</td>
                        <td> : $ {{$order->shipping->price}}</td>
                    </tr>
                    <tr>
                      <td>คูปอง</td>
                      <td> : $ {{number_format($order->coupon,2)}}</td>
                    </tr>
                    <tr>
                        <td>ยอดรวม</td>
                        <td> : $ {{number_format($order->total_amount,2)}}</td>
                    </tr>
                    <tr>
                        <!-- <td>Payment Method</td>
                        <td> : @if($order->payment_method=='cod') Cash on Delivery @else Paypal @endif</td> -->
                        <td>Payment Method</td>
                        <td> : 
                            @if($order->payment_method == 'cod')
                                Cash on Delivery
                            @elseif($order->payment_method == 'paypal')
                                Paypal
                            @elseif($order->payment_method == 'cardpay')
                                Card Payment
                            @endif
                        </td>

                    </tr>
                    <!-- <tr>
                        <td>Payment Status</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr> -->
                    <tr>
                      <td>Payment Status</td>
                      <td> : 
                          @if($order->payment_status == 'paid')
                              <span class="badge badge-success">Paid</span>
                          @elseif($order->payment_status == 'unpaid')
                              <span class="badge badge-danger">Unpaid</span>
                          @else
                              {{$order->payment_status}}
                          @endif
                      </td>
                  </tr>

              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">ข้อมูลการขนส่ง</h4>
              <table class="table">
                    <tr class="">
                        <td>ชื่อ</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>เบอร์โทรศัพ</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>ที่อยู่</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>ประเทศ จ.</td>
                        <td> : {{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>รหัสไปรษณีย์</td>
                        <td> : {{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div>
</div>
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
