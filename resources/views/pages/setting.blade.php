@extends('layout.main')
@push('links')
<style>
    .edit-profile-section{
        display: flex;
        justify-content: space-between;
        width: 60vw;
    }
    .edit-profile-section .detail{
        margin-top: 5vw;
        max-width: 40%;
    }
    .edit-profile-card{
        background-color: white;
        width: 60%;
        padding: 1rem;
        border-radius: 1rem;
    }
    .edit-profile-card form input{
        margin: 2vh;
        height: 5vh;
        background-color: rgb(236, 234, 234);
        padding: 0.5rem;
        border-radius: 0.5rem;
    }
    .edit-profile-card form{
        display: flex;
        flex-direction: column;
    }
    .edit-profile-card form button{
        width: 30%;
    }

</style>

@endpush
@section('main')
<div class='middle'>
    <div class="edit-profile-section">
        <div class="detail">
            <h2>Reset Your Credentials</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Quia minima quas.</p>
        </div>
            <div class="edit-profile-card">
                <p style="color: red">{{session('status')}}</p>
                    <x-form  method="post" :action="route('reset-password')">
                        @method('PUT')
                            <label for="email">Email</label>
                            <x-input name='email' type='email' id="email" value="{{Auth::user()->email}}" />
                            <label for="username">Username</label>
                            <x-input name='username' type='text' id="username" value="{{Auth::user()->username}}" />
                            <label for="password">Existing Password</label>
                            <small><b>*</b> password required to change user credentials</small>
                            <x-input name='password' type="password" id="password" value="" />
                            <label for="password">New Password</label>
                            <small> password can be changed if user password is correct</small>
                            <x-input name='new-password' type="password" id="password" value="" />
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </x-form>
            </div>
    </div>
    <div class="set-feed">

    </div>
    <div class="dark-mode-light-mode-toggle">

    </div>
</div>
@endsection
