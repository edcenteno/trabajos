<!DOCTYPE html>
<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>

</head>
<body>


    <div class="bgcolor">
        <label class="demo-label">Busqueda:</label><br/> <input type="text" name="busqueda" id="busqueda" class="typeahead"/>

    </div>

    <button type="submit">algo</button>

</body>
<script>
    $(document).ready(function () {
        $('#busqueda').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server.php",
                    data: 'query=' + query,
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        result($.map(data, function (item) {
                            return item;
                        }));
                    }
                });
            }
        });
    });
</script>
</html>
