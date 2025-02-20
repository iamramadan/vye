@extends('layout.main')
@push('links')
<style>
    /* General Styling */
    /* body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    } */

    .table-container {
        width: 60vw;
        height: fit-content;
        max-width: 800px;
        background: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #444;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #ddd;
        color: #333;
    }

    th {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    td {
        background-color: #fff;
    }

    .actions button {
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        color: white;
        cursor: pointer;
        margin-right: 5px;
    }

    .edit-btn {
        background-color: #f0ad4e;
    }

    .remove-btn {
        background-color: #ff4d4d;
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        th, td {
            font-size: 14px;
            padding: 10px;
        }
    }
</style>
@endpush
@section('main')
<div class="table-container">
    <h2>Manage Contestants</h2>
    <table>
        <thead>
            <tr>
                <th>Contestant Name</th>
                <th>Details (Backers, Engagement, ID)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @if (count($contestants) > 0)

        @foreach ($contestants as $contestant)
        <tr>
            <td><a href="{{route('poll.contestant.profile',['id'=>$contestant->id])}}">{{contestant($contestant->id,'username')}}</a></td>
            <td>
                <p><strong>Backers:</strong> {{backercount($contestant->id)}}</p>
                <p><strong>Engagement:</strong> 85%</p>
                <p><strong>ID:</strong> 12345</p>
            </td>
            <td class="actions">
                 <button class="edit-btn">Send Message</button>
                <button class="remove-btn">remove</button>
            </td>
        </tr>
        @endforeach
        @else
        <h2>No contestant under this poll</h2>
        @endif
        </tbody>
    </table>
</div>
@endsection
