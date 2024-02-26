@extends('layout')
@section('title', 'Check')
@section('content')
@include('include.sidemain')

<style>
    .transaction-history {
        margin-top: 50px;
    }

    .transaction {
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>

<div class="container">
    <!-- Your existing HTML content here -->

    <!-- Transaction History Section -->
    <div class="transaction-history">
        <h2>Transaction History</h2>
        <div id="transactionHistory">
            <!-- Transaction history will be dynamically added here -->
        </div>
    </div>
</div>

<script>
    // JavaScript functions for transaction history will be placed here
</script>
@endsection
