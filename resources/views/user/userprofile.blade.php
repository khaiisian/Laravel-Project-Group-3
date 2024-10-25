<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <title>User Profile</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3">
                <h2>User Profile</h2>
                <form action="" method="">
                   
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone number:</label>
                        <input type="text" name="phone" class="form-control input-field" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>

                <div class="row">
                <div class="mb-3 nrc-group">
                <label for="nrc" class="form-label">NRC:</label>
                <select class="form-control" id="nrc_region" name="nrc_region" required>
                    <option value="" disabled selected>Select</option>
                    <?php
                    for ($i = 1; $i <= 14; $i++) {
                        echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                </select>
                <span>/</span>
                <select class="form-control" id="nrc_township" name="nrc_township" required>
                    <option value="" disabled selected>Select</option>
                    <option value="N">N</option>
                    <option value="F">F</option>
                    <option value="A">A</option>
                </select>
                <span>/</span>
                <input type="text" class="form-control" id="nrc_number" name="nrc_number" maxlength="6" pattern="\d{6}" placeholder="000000" required>
            
                </div>

                    <h3>What are you looking for today?</h3>
                    <div class="mb-3">
                        <label for="post-type" class="form-label">Select one:</label>
                        <select name="post_type" class="form-control" id="post-type" required>
                            <option value="rent">I want to Rent</option>
                            <option value="buy">I want to Buy</option>
                        </select>
                    </div>

                    <h3>Your choice of home?</h3>
                    <div class="mb-3">
                        <label for="post-type" class="form-label">Select one:</label>
                        <select name="post_type" class="form-control" id="post-type" required>
                            <option value="apartment">Apartment</option>
                            <option value="condo">Condo</option>
                            <option value="private">Private House</option>
                            <option value="office">Office</option>
                        </select>
                    </div>

                    <h3>Where do you want to live?</h3>
                    <div class="mb-3">
                        <label for="post-type" class="form-label">Select one:</label>
                        <select name="post_type" class="form-control" id="post-type" required>
                            <option value="ygn">Yangon</option>
                            <option value="mdy">Mandalay</option>
                            <option value="bgo">Bago</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="post-content" class="form-label">Post Content:</label>
                        <textarea name="post_content" class="form-control" id="post-content" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
