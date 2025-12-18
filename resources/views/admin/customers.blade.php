@extends('layouts.admin')

@section('title','Admin Customers')

@section('content')
<div class="main">

    <div class="search">
        <input type="text" placeholder="🔍 Search customer">
    </div>

    <h2>👥 Customers</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Password</th>
                <th>Status</th>
                <th>Role</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($customers as $index => $c)
            @php
                $status = $c->status ?? 'aktif';
                $role   = $c->role ?? 'user';
            @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $c->nama ?? '-' }}</td>
                <td>{{ $c->username ?? '-' }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->telepon ?? '-' }}</td>
                <td class="password">********</td>
                <td>
                    <span class="badge {{ $status == 'aktif' ? 'aktif' : 'nonaktif' }}">
                        {{ strtoupper($status) }}
                    </span>
                </td>
                <td>
                    <span class="badge {{ $role }}">
                        {{ strtoupper($role) }}
                    </span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align:center">
                    Data customer kosong
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>
@endsection
