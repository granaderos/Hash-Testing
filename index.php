<!Doctype html>
<html>
<head>
    <title>Got a Hash!</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="container-fluid" style="margin-top: 50px;">
    <div class="container-fluid">
        <div class="container-fluid">
            <input type="text" id="txtPlainText" class="form-control" /><br />
            <button id="btnPassword" onclick="hashPassword()" class="btn btn-primary">password</button>
            <button id="btnMd5" onclick="hashMd5()" class="btn btn-primary">md5</button>
            <button id="btnMd5" onclick="hashCrypt()" class="btn btn-primary">crypt</button>
        </div>
        <br />
        <div>
            <table class="table table-striped" id="tblData"></table>
        </div>
    </div>

    <script src="javascript/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            displayData();
        });
        function hashCrypt() {
            var plainText = $("#txtPlainText").val();

            $.ajax({
                type: "POST",
                url: "php/hashIt.php",
                data: {plainText: plainText, algo: "crypt"},
                success: function(data) {
                    console.log(data);
                    displayData();
                }
            })
        }


        function hashPassword() {
            var plainText = $("#txtPlainText").val();

            $.ajax({
                type: "POST",
                url: "php/hashIt.php",
                data: {plainText: plainText, algo: "password"},
                success: function(data) {
                    displayData();
                }
            })
        }

        function hashMd5() {
            var plainText = $("#txtPlainText").val();

            $.ajax({
                type: "POST",
                url: "php/hashIt.php",
                data: {plainText: plainText, algo: "md5"},
                success: function(data) {
                    displayData();
                }
            })
        }

        function displayData() {
            var plainText = $("#txtPlainText").val();

            $.ajax({
                type: "POST",
                url: "php/displayIt.php",
                success: function(data) {
                   $("#tblData").html(data);
                }
            })
        }
    </script>
</body>
</html>