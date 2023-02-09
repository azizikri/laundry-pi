<form action="{{ route('client.logout') }}" method="post">
    @csrf
</form>

<script>
    @auth
        document.querySelector('form').submit();
    @endauth

    @guest
        window.location.href = "{{ route('client.login') }}";
    @endguest
</script>
