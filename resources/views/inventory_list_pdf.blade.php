<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">--}}
    <style>
        body {
            width: 595px;
            /*height: 842px;*/

            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
        }
        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-.5 * var(--bs-gutter-x));
            margin-left: calc(-.5 * var(--bs-gutter-x));
        }
        .col {
            float: left;
            box-sizing: border-box;
            /*width: 297px;*/
            width: 50%;
            margin-right: 1.5rem;
        }
        .g-4, .gy-4 {
            --bs-gutter-y: 1.5rem;
        }
        .g-4, .gx-4 {
            --bs-gutter-x: 1.5rem;
        }
        .text-end {
            text-align: right!important;
        }
        tbody, td, tfoot, th, thead, tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }
        td {
            display: table-cell;
            vertical-align: inherit;
            unicode-bidi: isolate;
        }
        table {
            caption-side: bottom;
            border-collapse: collapse;
        }
        .card {
            --bs-card-spacer-y: 1rem;
            --bs-card-spacer-x: 1rem;
            --bs-card-title-spacer-y: 0.5rem;
            --bs-card-title-color: ;
            --bs-card-subtitle-color: ;
            --bs-card-border-width: 1px;
            --bs-card-border-color: rgba(0, 0, 0, 0.175);
            --bs-card-border-radius: 0.375rem;
            --bs-card-box-shadow: ;
            --bs-card-inner-border-radius: calc(0.375rem - (1px));
            --bs-card-cap-padding-y: 0.5rem;
            --bs-card-cap-padding-x: 1rem;
            --bs-card-cap-bg: rgba(33,37,41, 0.03);
            --bs-card-cap-color: ;
            --bs-card-height: ;
            --bs-card-color: ;
            --bs-card-bg: #fff;
            --bs-card-img-overlay-padding: 1rem;
            --bs-card-group-margin: 0.75rem;
            padding: 2rem;
            position: relative;
            min-width: 0;
            height: var(--bs-card-height);
            color: #212529;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: thin solid rgba(0, 0, 0, 0.175);
            border-radius: 0.375rem;
        }
        .card-body {
            padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
            color: var(--bs-card-color);
        }
        .card-title {
            margin-bottom: var(--bs-card-title-spacer-y);
            color: var(--bs-card-title-color);
        }
        .text-center {
            text-align: center!important;
        }
        .card-body {
            padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
            color: var(--bs-card-color);
        }
        .card-img, .card-img-top {
            border-top-left-radius: var(--bs-card-inner-border-radius);
            border-top-right-radius: var(--bs-card-inner-border-radius);
        }
        .card-img, .card-img-bottom, .card-img-top {
            height: 150px;
            width: auto;
        }
        img, svg {
            vertical-align: middle;
        }
        .page_break { page-break-before: always; }
    </style>
</head>
<body>

<div class="row row-cols-2">
    @foreach($records as $record)

        <div class="col">
            <div class="card">
                @php
                    // Path to your image file
                    $imagePath = public_path('storage/'.$record->image);

                    // Read image content and encode it to base64
                    $type = pathinfo($imagePath, PATHINFO_EXTENSION);
                    $base64Image = base64_encode(file_get_contents($imagePath));

                    // Build the data URL
                    $imageDataUrl = 'data:image/'.$type.';base64,' . $base64Image;
                @endphp
                <img src="{{ $imageDataUrl }}" alt="{{$imagePath}}" class="card-img-top">
                <div class="card-body">
                    <div class="card-title text-center"><b>{{ $record->item_name. ' - '. $record->gender }}</b></div>
                    <table style="border:none; width: 100%;">
                        <tr>
                            <td><b>Sr. No. </b></td>
                            <td class="text-end"><b>{{ $record->item_code }}</b></td>
                        </tr>
                        <tr>
                            <td>Gross Weight</td>
                            <td class="text-end">{{ $record->gross_weight }}g</td>
                        </tr>
                        <tr>
                            <td>Net Weight</td>
                            <td class="text-end">{{ $record->net_weight }}g</td>
                        </tr>
                        <tr>
                            <td>Diamond Weight</td>
                            <td class="text-end">{{ $record->diamond_weight }}ct</td>
                        </tr>
                        <tr>
                            <td>Diamond Quality</td>
                            <td class="text-end">{{ $record->diamond_quality }}</td>
                        </tr>
                        <tr>
                            <td>Karat</td>
                            <td class="text-end">{{ $record->karat }}</td>
                        </tr>
                        <tr>
                            <td>Color Stone</td>
                            <td class="text-end">{{ $record->color_stone }}</td>
                        </tr>
                        @foreach($record->others as $key=>$value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td class="text-end">{{ $value }}</td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
        @if(($loop->index+1) % 2 == 0)
            <br style="clear:both;"/>
        @endif

        @if(($loop->index+1) % 4 == 0)
            <div class="page_break"></div>
        @endif

    @endforeach




</div>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>--}}
</body>
</html>
