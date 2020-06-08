<?php include('header.php'); ?>

<html>
<style>
  .required:before {
    content:" * ";
    color: red;
  }
</style>

<body>

  <div class="jumbotron" style="margin:50px";>
  <form>
      <!-- <h4 style="color:red">*</h4><p>Was the material unique?</p> -->
      <p><label class="required">1) Was the material unique?</label></p>
      <label class="radio-inline">
        <input type="radio" name="Q1" onchange="">Option 1
      </label>
      <label class="radio-inline">
        <input type="radio" name="Q1">Option 2
      </label>
      <label class="radio-inline">
        <input type="radio" name="Q1">Option 3
      </label>

      <br><br><p><label class="required">1) Was the material good?</label></p>
      <label class="radio-inline">
        <input type="radio" name="Q1" onchange="">Option 1
      </label>
      <label class="radio-inline">
        <input type="radio" name="Q1">Option 2
      </label>
      <label class="radio-inline">
        <input type="radio" name="Q1">Option 3
      </label>

      <p><label class="required">1) Was the material copied?</label></p>
      <label class="radio-inline">
        <input type="radio" name="Q2" onchange="">Option 1
      </label>
      <label class="radio-inline">
        <input type="radio" name="Q2">Option 2
      </label>
      <label class="radio-inline">
        <input type="radio" name="Q2">Option 3
      </label>

      <p><label class="required">1) Is there a need for review ?</label></p>
      <label class="radio-inline">
        <input type="radio" name="Q3" onchange="">Option 1
      </label>
      <label class="radio-inline">
        <input type="radio" name="Q3">Option 2
      </label>
      <label class="radio-inline">
        <input type="radio" name="Q3">Option 3
      </label>
      </form>
    
      <br><br>
      <div class="container">
      <form>
      <div class="form-group">
        <h3><label for="comment">Comment to author:</label></h3>
        <textarea class="form-control" rows="5" cols="10" id="comment"></textarea>
      </div>
      <br><br>
      <div class="form-group">
        <h3><label for="comment">Comment to editor:</label></h3>
        <textarea class="form-control" rows="5" cols="10" id="comment"></textarea>
      </div>
    </form>
    </div>
    </div>

    

    

    <script>

      var q1 = document.getElementByName("Q1").value;
      alert(q1);
    </script>
  </body>
  </html>