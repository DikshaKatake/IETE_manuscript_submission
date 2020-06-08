<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A stepper plugin for Bootstrap 4.">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="dist/css/bs-stepper.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">

    <title>Manuscript Submission</title>
    <?php include('mdb_header.php'); ?>
    <style>
        .invisible {
            position: absolute;
            left: -9999px;
        }
    </style>
  </head>
  <body class="d-flex flex-column min-vh-100 bg-light">
  <? include('navbar_header.php') ?>
    
    <div class="container flex-grow-1 flex-shrink-0 py-5">
    <div style="margin-top:80px; !important" class="mb-5 p-4 bg-white shadow-sm z-depth-1-half">
        <div class="text-center"><h3>Manuscript Submission</h3></div><br><br>
        <div id="stepperForm" class="bs-stepper">
          <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#test-form-1">
              <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger1" aria-controls="test-form-1">
                <span class="bs-stepper-circle">1</span>
                <span class="bs-stepper-label">Basic</span>
              </button>
            </div>
            <div class="bs-stepper-line"></div>
            <div class="step" data-target="#test-form-2">
              <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger2" aria-controls="test-form-2">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label">Co-author</span>
              </button>
            </div>
            <div class="bs-stepper-line"></div>
            <div class="step" data-target="#test-form-3">
              <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger3" aria-controls="test-form-3">
                <span class="bs-stepper-circle">3</span>
                <span class="bs-stepper-label">Upload</span>
              </button>
            </div>
            <div class="bs-stepper-line"></div>
            <div class="step" data-target="#test-form-4">
              <button type="button" class="step-trigger" role="tab" id="stepperFormTrigger4" aria-controls="test-form-4">
                <span class="bs-stepper-circle">4</span>
                <span class="bs-stepper-label">Verify</span>
              </button>
            </div>
          </div><br>

          <div class="bs-stepper-content">
          <!-- <form method = "post" class="needs-validation" novalidate> -->

            <form method = "post" class="needs-validation" onSubmit="return false" novalidate>
              <div id="test-form-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger1">
                <div class="form-group">
                  <label for="inputMailForm">Journal name : <span class="text-danger font-weight-bold">*</span></label>
                  <input id="inputMailForm" name = "inputMailForm" type="email" autocomplete="off" class="form-control" placeholder="Enter manuscript name..." required>
                  <div class="invalid-feedback">Please fill the journal name !</div>
                </div>
                <!-- category -->
                <div class="md-form input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default">Journal Category : </span>
                    </div>
                        <select name="selectedCategory" id="selectedCategory" class="form-control selectpicker" data-live-search="true">
                        <option value="Science">Science</option>
                        <option value="Technology">Technology</option>
                        <option value="Literature">Literature</</option>
                        <option value="Food and health">Food and health</option>
                        </select>
                        <br /><br />
                        <!-- <input type="hidden" name="hidden_framework" id="hidden_framework" /> -->
                </div>
                <div class="text-center">
                    <br><button class="btn btn-primary btn-next-form">Next</button>
                </div>

              </div>


            <div id="test-form-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepperFormTrigger2">
                <div class="md-form">
                    <i class="fas fa-pencil-alt prefix"></i>
                    <textarea id="inputAuthor" name = "inputAuthor" class="md-textarea form-control" rows="3" required></textarea>
                    <label for="inputAuthor">Co-authors Names</label>
                    <div class="invalid-feedback">Input 'NA' if no co-authors !</div>
                  </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-next-form" onclick="myFunction()">Next</button>
                </div>            
            </div>


              <div id="test-form-3" role="tabpanel" class="text-center bs-stepper-pane fade" aria-labelledby="stepperFormTrigger3">
                <!-- upload the abstract -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload the abstract : </span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputAbstractFile" name = "inputAbstractFile"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Click here to choose file...</label>
                  </div>
                </div>
                <br>
                <button class="btn-lg btn-primary" onclick="uploadAbstract()">Upload Abstract</button>

                <br><br><br><hr><br><br>
                <!-- upload the journal -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload the journal : </span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name = "fileMain" class="custom-file-input" id="inputGroupFile"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Click here to choose file...</label>
                  </div>
                </div>
                <br>
                <button class="btn-lg btn-primary" onclick="uploadManuscript()">Upload Manuscript</button>



                <div class="text-center">
                    <!-- <button class="btn btn-primary btn-next-form" onclick="myFunction()">Next</button> -->
                    <br><br><br><br><button class="btn btn-primary btn-next-form" >Next</button>
                </div>
              </div>

              
              <div id="test-form-4" role="tabpanel" class="bs-stepper-pane fade text-center" aria-labelledby="stepperFormTrigger4">
                <h1><a href="verify_author.php" target="_blank"> VIEW </a><br><br></h1>
                <h3>Verify your uploaded file before confirming submission</h3>
                <br><br>
                <a href = "cancel_submission.php" class = "btn btn-primary">Cancel submission</a>
                <a href = "confirm_submission.php" class = "btn btn-primary">Confirm submission</a>


                <!-- <input value="Submit" type="button" id="submit" onclick = "myFunction2()" class="btn btn-primary mt-5"> --> 
              </div>

            </form>


          </div>
        </div>
      </div>
    </div>







        <!-- useless code -->
      <div class="invisible mb-5 p-4 bg-white shadow-sm">
        <h3>Linear stepper</h3>
        <div id="stepper1" class="bs-stepper">
        </div>
      </div>
      <div class="invisible mb-5 p-4 bg-white shadow-sm">
        <h3>Non linear stepper</h3>
        <div id="stepper2" class="bs-stepper">
          <div class="bs-stepper-header" role="tablist"> 
          </div>
          <div class="bs-stepper-content"> 
          </div>
        </div>
      </div>
      <div class="invisible mb-5 p-4 bg-white shadow-sm">
        <h3>Non linear stepper (with fade)</h3>
        <div id="stepper3" class="bs-stepper">
          <div class="bs-stepper-header" role="tablist"> 
          </div>
          <div class="bs-stepper-content"> 
          </div>
        </div>
      </div>
    <div class="invisible mb-5 p-4 bg-white shadow-sm">
        <div id="stepper4" class="bs-stepper vertical">    
        </div>
      </div>
    <div class=" invisible mb-5 p-4 bg-white shadow-sm">
        <h3>Form validation</h3>
        <div id="stepperForm" class="bs-stepper">
          <div class="bs-stepper-header" role="tablist"> 
          </div>
          <div class="bs-stepper-content">
          </div>
        </div>
      </div>
    </div>
    
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <!-- <script src="dist/js/bs-stepper.min.js"></script> -->

   <script> 

    // function setJounalCookie()
    // {
    //   document_cookie = 'journal_name' + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    //   var fakepath = document.getElementById('inputGroupFile').value;
    //   var filename = fakepath.split("\\").pop();
    //   document.cookie = 'jounral_name=' + filename;
    // }
      function validate_files(){
        // var x = 
        alert(document.getElementById("inputGroupFile").value);
        // var x = 
        alert(document.getElementById("inputAbstractFile").value);
        // document.getElementById("demo").innerHTML = x;
      }


      function myFunction() {
        var name = document.getElementById("inputMailForm").value;
        var selectedCategory = document.getElementById("selectedCategory").value;
        var inputAuthor = document.getElementById("inputAuthor").value;
        // var password = document.getElementById("password").value;
        // var contact = document.getElementById("contact").value;
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'name=' + name + '&selectedCategory=' + selectedCategory + '&inputAuthor=' + inputAuthor ;
        if (name == '' || inputAuthor == '') {
        alert("Please Fill All Fields");
        } else {
        // AJAX code to submit form.
        $.ajax({
        type: "POST",
        url: "manu_submit_1.php",
        data: dataString,
        cache: false,
        success: function(html) {
        // alert(html);
        }
        });
        }
        return false;
      }


      function uploadAbstract()
      {
        var file_data = $('#inputAbstractFile').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        alert(form_data);                             
        $.ajax({
            url: 'manu_submit_2.php', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(){
              alert("Abstract Uploaded Successfully !");
                // alert(php_script_response); // display response from the PHP script, if any
            }
        });
      }


      function uploadManuscript()
      {
        var file_data = $('#inputGroupFile').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        alert(form_data);                             
        $.ajax({
            url: 'manu_submit_3.php', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(){
                alert("Manuscript Uploaded Successfully !");
                // alert(php_script_response); // display response from the PHP script, if any
            }
        });
      }


</script>














    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="stepper_validation.js"></script>

    <?php include('mdb_footer.php'); ?>














  </body>
</html>


