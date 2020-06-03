<?php
    $directory = 'scripts';

    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }


    function extract_email($string) {
        preg_match('/\b[^\s]+@[\w\d.-]+/', $string, $match);
        return $match[0];
    }

    // str_replace($search, $replace, $subject)

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Team Falcon</title>

    <style>
        #btn {
           border: 1px solid #ddd;
        }

    </style>

</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4">
                <button class="btn btn-light" id="btn">Submitted <span class="badge-primary" id="badge">4</span></button>
            </div>
            <div class="col-lg-4">
                <button class="btn btn-light" id="btn">Passes  <span class="badge-success" id="badge">4</span></button>
            </div>
            <div class="col-lg-4">
                <button class="btn btn-light" id="btn">Fails <span class="badge-danger" id="badge">4</span></button>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $counter = 0;
                        foreach (glob($directory."/*.*") as $file)  {
                            $counter++;

                            # Get file Extension
                            $filename = str_ireplace('scripts/','',$file);
                            $ext = substr(strrchr($filename, "."), 1);

                            # Command for Php
                            if ($ext == 'php') {
                                $response = exec("$ext $file 2>&1", $output);
                            } else if ($ext == 'js') {
                                $response = exec("node $file 2>&1", $output);
                            } else if ($ext == 'py') {
                                $response = exec("$ext $file 2>&1", $output);
                            } else {
                                $response = 'Not PHP';
                                $internName = 'No name';
                                $email = 'No Email';
                                $newResponse = 'Not PHP';
                                $status = 'fail';
                            }

                            $internName = trim(get_string_between($response, 'this is', 'with'));
                            $internID = $id = trim(get_string_between($response, 'ID', 'using'));
                            $language = trim(get_string_between($response, 'using', 'for'));
                            $email = extract_email($response);

                            $newResponse = (String) str_replace($email, "",$response);

                            # Check status of response
                            $passCondition1 = "Hello World, this is {$internName} with HNGi7 ID {$internID} using {$language} for stage 2 task ";
                            $passCondition2 = "Hello World, this is {$internName} with HNGi7 ID {$internID} using {$language} for stage 2 task.";
                            $passCondition3 = "Hello World, this is {$internName} with HNGi7 ID {$internID} using {$language} for stage 2 task";
                            $passCondition4 = "Hello World, this is {$internName} with HNGi7 ID {$internID} using {$language} for stage 2 task. ";


                            if (($passCondition1 == $newResponse) || ($passCondition2 == $newResponse) || ($passCondition3 == $newResponse) || ($passCondition4 == $newResponse)) {
                                $status = '<b class="text-success">pass</b>';
                            } else {
                                $status = '<b class="text-danger">fail</b>';
                            }

                            ?>
                            <tr>
                                <td><?php echo $counter; ?></td>
                                <td><?php echo $internID;  ?></td>
                                <td><?php echo $newResponse;  ?></td>
                                <td><?php echo $status;  ?></td> <!-- -->
                            </tr>
                            <?
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>