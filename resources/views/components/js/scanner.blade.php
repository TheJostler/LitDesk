{{-- Server injects --}}
<script>
  var queryRoute = '{{route('items.index')}}';
  var csrf = '{{csrf_token()}}';
  var createRoute = '{{route('items.create')}}';
</script>

{{-- Load Hot Modules with vite --}}
@vite([
  'resources/js/scanner.js',
])