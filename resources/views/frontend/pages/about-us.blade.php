@extends('frontend.layouts.master')

@section('title','ร้านอุปกรณ์ตกปลา || About Us')

@section('main-content')

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{route('home')}}">หน้าหลัก<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">About Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- About Us -->
	<section class="about-us section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-12">
						<div class="about-content">
							@php
								$settings=DB::table('settings')->get();
							@endphp
							<h3>เศรษฐ์ เกิดแสง <span>ยินดีต้อนรับ สู่ร้านขายอุปกรณ์ตกปลา</span></h3>
							<p>@foreach($settings as $data) {{$data->description}} @endforeach</p>
							<div class="button">
								<a href="{{route('blog')}}" class="btn">บทความ</a>
								<a href="{{route('contact')}}" class="btn primary">Contact Us</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="about-img overlay">
							<div class="button">
								<a href="#" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
							</div>
							<img src="@foreach($settings as $data) {{$data->photo}} @endforeach" alt="@foreach($settings as $data) {{$data->photo}} @endforeach">
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- End About Us -->


	<!-- Start Shop Services Area -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>จัดส่งฟรี</h4>
						<p>เมื่อซื้อครบ 1,000 บาท</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>ยินดีรับคืนสินค้า</h4>
						<p>ภายใน 30วัน เฉพาะสินค้าที่กำหนด</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>ชำระเงินอย่างปลอดภัย</h4>
						<p>100%ความปลอดภัย</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>ราคาถูก</h4>
						<p>ถูกจริง</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->

	@include('frontend.layouts.newsletter')
@endsection
