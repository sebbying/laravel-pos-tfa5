@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
    <header class="page-heading"><p class="eyebrow">PEOPLE BEHIND THE COUNTER</p><h1>User Accounts</h1><p>Browse staff account details, assigned roles, and account status.</p></header>

    <section class="table-panel" aria-labelledby="users-title">
        <div class="table-heading"><div><h2 id="users-title">User directory <span class="count-badge">{{ count($users) }}</span></h2><p>All user accounts in this sample directory.</p></div><span class="sample-label">Sample records</span></div>
        <div class="table-scroll" role="region" aria-label="User accounts table" tabindex="0">
            <table>
                <caption class="sr-only">User account IDs, names, email addresses, roles, and status.</caption>
                <thead><tr><th scope="col">Account ID</th><th scope="col">User</th><th scope="col">Role</th><th scope="col">Status</th></tr></thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="record-id">USR-{{ str_pad((string) $user['id'], 3, '0', STR_PAD_LEFT) }}</td>
                            <td><div class="person-cell"><span class="avatar avatar-blue" aria-hidden="true">{{ strtoupper(substr($user['name'], 0, 1)) }}</span><div><strong>{{ $user['name'] }}</strong><span>{{ $user['email'] }}</span></div></div></td>
                            <td><span class="role-badge">{{ $user['role'] }}</span></td>
                            <td><span class="status {{ $user['status'] === 'Active' ? 'status-active' : 'status-inactive' }}"><span aria-hidden="true"></span>{{ $user['status'] }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-footer"><span>{{ count($users) }} user accounts</span><span>View only</span></div>
    </section>
    <p class="directory-note">These fictional records demonstrate the user directory. <a href="{{ route('about') }}">Learn about this application <span aria-hidden="true">&rarr;</span></a></p>
@endsection
