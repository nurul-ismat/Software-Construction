<!DOCTYPE html>
<html>
<head>
    <title>Albijadi Enquiry</title>
</head>
<body>

    <h1>New Property Showing request</h1>

    <span>Property Title: {{ $details['p_title'] }} </span> <br><br>
    <span>Owner Name: {{ $details['p_owner_name'] }} </span> <br><br>
    <span>City: {{ $details['p_city'] }} </span> <br><br>
    
    <p>--------client----------</p>
    <span>Name: {{ $details['name'] }} </span> <br><br>
    <span>Email: {{ $details['email'] }} </span> <br><br>
    <span>Mobile: {{ $details['mobile'] }} </span> <br><br>
    <span>Message: {{ $details['message'] }} </span> <br><br>
    
</body>
</html>