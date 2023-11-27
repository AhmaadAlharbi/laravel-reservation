<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Excel</title>
    <!-- Include Bootstrap stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Include DataTables stylesheet from CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
</head>

<body>
    <a href="https://mew-my.sharepoint.com/:x:/g/personal/azaalharbi_mew_gov_kw/EZVAeisdeZpHn0Cuhx8nU7oBbYgwi12Ga7piOYPSuezd-Q?e=flHyjV"
        target="_blank">Show Excel File</a>

    {{-- <div class="container mt-4">
        <table id="yourTableId" class="display table table-bordered">
            <thead class="thead-dark">
                <tr class="bg-info">
                    @foreach ($data[0] as $header)
                    <th>{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach (array_slice($data, 1) as $row)
                <tr class="{{ $row[0] === 'e1' ? 'unit-e1' : ($row[0] === 'e2' ? 'unit-e2' : '') }}">
                    @foreach ($row as $index => $cell)
                    <td class="{{ $cell === null ? 'empty-cell' : '' }}">{{ $cell !== null ? $cell : '' }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
    <div class="container">
        <iframe src="{{ asset('testPdf.pdf') }}" width="100%" height="1000px"
            onload="adjustIframeHeight(this)"></iframe>

    </div>


    <!-- Include jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- Include DataTables JavaScript from CDN -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js">
    </script>
    <!-- Include Bootstrap JavaScript (optional) from CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function adjustIframeHeight(iframe) {
            // Wait for the PDF to load
            iframe.contentWindow.addEventListener('load', function() {
                // Set the iframe height based on the content height
                iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#yourTableId').DataTable();
        });
    </script>
</body>

</html>