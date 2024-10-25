<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Contact us</title>
</head>
<body>
        <div class="contact-head">
            <h1>Contact us</h1>
            <p>You can leave your contact information here. We will reply to you shortly</p>
        </div>
        <div class="contact-form">
            <div class="row">
                <div class="col-4">
                <form action="">
        
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload your image</label>
                        <input type="file" name="image" id="image" class="form-control input-field" accept="image/*" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control input-field" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone number:</label>
                        <input type="text" name="phone" class="form-control input-field" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control input-field"  required>
                    </div>


                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
                </div>
                <div class="col-8">
                    <h3>Home Ease Information</h3>
                         <div class="contactinfo">
                            <p>Company Name: HomeEase </p>
                            <p>Address: 1234 Real Estate St., Yangon, Myanmar </p>
                            <p>Phone Number: +95 123 456 789 </p>
                            <p>Email: contact@homeease.com</p>

                                <div class="map-responsive">
                                <iframe src="https://maps.google.com/maps?q=1234%20Real%20Estate%20St.,%20Yangon,%20Myanmar&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>