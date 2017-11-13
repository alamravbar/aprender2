
<script type="text/javascript" src= "js/validator.min.js">

</script>
<form id="sumate" data-toggle="validator" role="form">

  <div class="form-group">
    <label for="nombre" class="control-label">Name</label>
    <input type="text" class="form-control" id="nombre" required>
  </div>

  <div class="form-group">
    <label for="apellido" class="control-label">Name</label>
    <input type="text" class="form-control" id="apellido" required>
  </div>

  <div class="form-group">
    <label for="email" class="control-label">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Em@il" data-error="Email invalido" required>
    <div class="help-block with-errors"></div>
  </div>


  <div class="form-group">
    <label for="inputPassword" class="control-label">Password</label>
    <div class="form-inline row">
      <div class="form-group col-sm-6">
        <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
        <div class="help-block">Minimum of 6 characters</div>
      </div>
      <div class="form-group col-sm-6">
        <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="radio">
      <label>
        <input type="radio" name="underwear" required>
        Boxers
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="underwear" required>
        Briefs
      </label>
    </div>
  </div>
  <div class="form-group">
    <div class="checkbox">
      <label>
        <input type="checkbox" id="terms" data-error="Before you wreck yourself" required>
        Check yourself
      </label>
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
