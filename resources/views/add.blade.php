<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form method="post" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="file" accept="text/xml"  name="xmlfile" value="" placeholder="Please enter First name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>