@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

<div class="search">
    <input type="text" placeholder="🔍 Search">
</div>

<div class="stats">

    <div class="box">
        <div class="box-icon">👤</div>
        <div class="box-content">
            <h4>Total User</h4>
            <p>{{ number_format($totalUser) }}</p>
        </div>
    </div>

    <div class="box">
        <div class="box-icon">🛒</div>
        <div class="box-content">
            <h4>Orders</h4>
            <p>{{ number_format($totalOrder) }}</p>
        </div>
    </div>

    <div class="box">
        <div class="box-icon">💲</div>
        <div class="box-content">
            <h4>Last Week Earning</h4>
            <p>Rp {{ number_format($lastWeekEarning, 0, ',', '.') }}</p>
        </div>
    </div>

    <div class="box">
        <div class="box-icon">🚚</div>
        <div class="box-content">
            <h4>Products Delivered</h4>
            <p>{{ number_format($deliveredProduct) }}</p>
        </div>
    </div>

</div>

@endsection
