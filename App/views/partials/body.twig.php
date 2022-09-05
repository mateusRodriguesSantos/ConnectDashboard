<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{BASE}}assets/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="{{BASE}}css/style.css" /> -->
    <title>
        {% block title %}{% endblock %}
    </title>
</head>

<body>
    {% block navBarData %}{% endblock %}

    {% block body %}{% endblock %}
</body>

</html>