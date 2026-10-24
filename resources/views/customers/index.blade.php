@extends('layouts.app')

@section('title', 'Customer Accounts')

@section('content')
    <header class="page-heading"><p class="eyebrow">PEOPLE YOU SERVE</p><h1>Customer Accounts</h1><p>A simple directory of customer contact details and account status.</p></header>

    <section class="table-panel" aria-labelledby="customers-title">
        <div class="table-heading"><div><h2 id="customers-title">Customer directory <span class="count-badge">{{ count($customers) }}</span></h2><p>All customer accounts in this sample directory.</p></div><span class="sample-label">Sample records</span></div>
        <div class="table-scroll" role="region" aria-label="Customer accounts table" tabindex="0">
            <table>
                <caption class="sr-only">Customer account IDs, names, emails, phone numbers, cities, and status.</caption>
                <thead><tr><th scope="col">Account ID</th><th scope="col">Customer</th><th scope="col">Phone</th><th scope="col">City</th><th scope="col">Status</th></tr></thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td class="record-id">CUS-{{ str_pad((string) $customer['id'], 3, '0', STR_PAD_LEFT) }}</td>
                            <td><div class="person-cell"><span class="avatar" aria-hidden="true">{{ strtoupper(substr($customer['name'], 0, 1)) }}</span><div><strong>{{ $customer['name'] }}</strong><span>{{ $customer['email'] }}</span></div></div></td>
                            <td class="nowrap">{{ $customer['phone'] }}</td>
                            <td>{{ $customer['city'] }}</td>
                            <td><span class="status {{ $customer['status'] === 'Active' ? 'status-active' : 'status-inactive' }}"><span aria-hidden="true"></span>{{ $customer['status'] }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="table-footer"><span>{{ count($customers) }} customer accounts</span><span>View only</span></div>
    </section>
    <p class="directory-note">These fictional records demonstrate the customer directory. <a href="{{ route('about') }}">Learn about this application <span aria-hidden="true">&rarr;</span></a></p>
@endsection
