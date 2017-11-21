<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script type="text/javascript">
    $.get("https://graph.facebook.com/me/friends",
        {access_token: <access_token>},
        function(data){ document.write("Data Loaded: " + data);});
    </script>
  </body>
</html>
