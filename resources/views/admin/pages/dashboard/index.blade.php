@extends('layout.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">About Bank Sampah</h4>
                </div>
                <div class="card-body">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae voluptas aperiam laudantium, vero at
                        excepturi architecto quam modi sunt maxime rem temporibus et eius minus neque cumque voluptatum!
                        Velit, quos!
                    </p>
                </div>
            </div>
        </section>
    </div>
@endsection
