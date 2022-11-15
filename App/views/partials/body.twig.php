<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{BASE}}assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{BASE}}assets/css/style.css" />
    <title>
        {% block title %}{% endblock %}
    </title>
</head>

<body>
    <div class="container-fluid h-100" id="principal">
        <div class="row h-100">
            <div class="col-2 h-100" id="navBar">
                {% block navBarData %}{% endblock %}
            </div>
            <div class="col h-25" style="background-color: darkgreen;">
                {% block body %}{% endblock %}
            </div>
        </div>
    </div>
</body>

</html>