<x-dashboard.layout title="Detail user" desc="vldm">
    <div class="mb-10">
        <span>... / </span><a href="{{ route('dashboard.users') }}" class="text-blue-500 hover:text-blue-500/70">
            users</a><span> / {{ $user['username'] }}</span>
    </div>
    <p>full name: {{ $user['full_name'] }}</p>
    <p>username: {{ $user['username'] }}</p>
</x-dashboard.layout>
