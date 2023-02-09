<form action="{{ route('admin.logout') }}" method="post">
    @csrf
</form>

<script>
    @auth('admin')
        document.querySelector('form').submit();
    @endauth

    @guest('admin')
        window.location.href = "{{ route('client.index') }}";
    @endguest
</script>
