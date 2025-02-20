@extends('layout.main')
@push('links')
<style>
    /* body {
      font-family: Arial, sans-serif;
      background-color: #f3f4f6;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    } */
    .form-container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 100%;
      height: fit-content;
      max-width: 50vw;
    }
    h2 {
      margin-bottom: 20px;
      color: #333;
    }
    .label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .input{
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1rem;
    }
    textarea {
      resize: vertical;
      min-height: 100px;
    }
    button {
      background-color: #4caf50;
      color: white;
      font-weight: bold;
      cursor: pointer;
      border: none;
      transition: background-color 0.3s;
    }
    /* button:hover {
      background-color: #45a049;
    } */
  </style>
@endpush
@section('main')
  <div class="form-container">
    <h2>Update Poll</h2>

    <form action="{{route('campaign.admin.updatepoll')}}" method="POST">
        @csrf
        @method('PUT')
      <label for="poll-name" class="label">Poll Name</label>
      <input type="text" id="poll-name" value="{{$poll[0]->name}}" name="name" class="input" placeholder="Enter the poll name" required>
        {{-- @dd($poll) --}}
      <label class="label" for="poll-about">About</label>
      <textarea id="poll-about" class="input" name="about"  placeholder="Describe the poll..." required>{{$poll[0]->about}}</textarea>
        <input type="hidden" name="campaign_id" value="{{$campaign[0]->id}}">
        <input type="hidden" name="poll_id" value="{{$poll[0]->id}}">
      <button type="submit" class="btn btn-primary">Update Poll</button>
    </form>
  </div>
@endsection
