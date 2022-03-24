@php($user = Auth::user())

<x-layout title="Profile">
    @include('shared.navbar')
    <p>{{ $user->email }}</p>
    <a href="/auth/sign-out" class="text-rose-700">Sign out</a>
</x-layout>
