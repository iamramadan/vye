@extends('layout.main')
@push('links')
    <style>
        /* General Styling */
/* {{-- body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
} --}} */

.admin-container {
    text-align: center;
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 600px;
    height: fit-content;
}

/* Header */
.admin-container h1 {
    margin-bottom: 20px;
    color: #333;
}

/* Options Styling */
.admin-options {
    display: flex;
    flex-direction: column;
    /* flex-wrap: wrap; */
    gap: 15px;
    justify-content: center;
}

.admin-card {
    text-decoration: none;
    background: rgb(118, 118, 182);
    color: white;
    padding: 15px 20px;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
    width: 100%;
    text-align: center;
}

.admin-card:hover {
    background: #0056b3;
    box-shadow: 0 5px 8px rgba(0, 0, 0, 0.3);
}
    </style>
@endpush
@section('main')
<div class="admin-container">
    <h1>Admin Dashboard</h1>
    <div class="admin-options">
        <a href="{{route('campaign.admin.manage',['name'=>$adminname])}}" class="admin-card">Manage Polls</a>
        <a href="{{route('campaign.admin.updatepage',['name'=>$adminname])}}" class="admin-card">Edit Campaign</a>
        <a href="{{route('campaign.admin.retrievepoll',['name'=>$adminname])}}" class="admin-card">Retrieve Polls</a>
        <a href="#" class="admin-card">View Stats</a>
        <a href="#" class="admin-card">Promotions</a>
    </div>
</div>
@endsection
