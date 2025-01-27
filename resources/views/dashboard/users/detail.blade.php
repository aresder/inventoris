<x-dashboard.layout title="Detail user" desc="Detail user {{ $user['username'] }}">
    <div class="mt-10">
        <p>full name: {{ $user['full_name'] }}</p>
        <p>username: {{ $user['username'] }}</p>
    </div>
</x-dashboard.layout>
