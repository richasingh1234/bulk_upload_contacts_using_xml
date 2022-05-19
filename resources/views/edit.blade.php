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
                <form method="post" action="{{ route('contact.update',$contact->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" name="fname" value="{{$contact->name}}" placeholder="Please enter First name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="fname">Last Name:</label>
                        <input type="text" class="form-control" value="{{$contact->lastName}}" name="lname" placeholder="Please enter Last name" required>
                    </div>

                    <div class="form-group">
                        <label for="fname">Phone:</label>
                        <input type="text" class="form-control"  value="{{$contact->phone}}" name="phone" placeholder="Please enter mobile" required>
                    </div>

                    <button type="submit" class="btn btn-info">Update</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>