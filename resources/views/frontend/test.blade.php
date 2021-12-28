@push('after-styles')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="three.min.js"></script>
    <script src="panolens.min.js"></script>
    <style>
          html, body {
        margin: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: #000;
      }

      canvas.panolens-canvas {
          height: 500px !important;
      }
    </style>
@endpush

@section('content')



@endsection


@push('after-scripts')

@endpush