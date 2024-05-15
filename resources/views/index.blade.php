<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    

<div class="container">
  <h2>User form</h2>
  {{ Form::open(['role' => 'form','class' => 'form-horizontal', 'files' => true,"autocomplete"=>"off",'id'=>'userForm']) }}
  @csrf
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-10">
      {{ Form::text('name','',  ['class' => 'form-control','maxlength'=>"250",'id'=>'name','placeholder'=>'']) }}
      <span id="name_error" class="text-danger"></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
      {{ Form::text('email','',  ['class' => 'form-control','maxlength'=>"250",'id'=>'email','placeholder'=>'']) }}
      <span id="email_error" class="text-danger"></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Phone:</label>
      <div class="col-sm-10">
      {{ Form::text('phone','',  ['class' => 'form-control','maxlength'=>"250",'id'=>'phone','placeholder'=>'']) }}
      <span id="phone_error" class="text-danger"></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Description:</label>
      <div class="col-sm-10">
      {{ Form::textarea('description','',  ['class' => 'form-control','maxlength'=>"250",'id'=>'description','placeholder'=>'']) }}
      <span id="description_error" class="text-danger"></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Role:</label>
      <div class="col-sm-10">
      {{ Form::select('role_id', $roles, null, ['class' => 'form-control', 'id' => 'role_id']) }}
      <span id="role_id_error" class="text-danger"></span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Profile Image:</label>
      <div class="col-sm-10">
      {{ Form::file('profile_image', ['class' => 'form-control-file','accept' => '.jpg, .jpeg, .png','id'=>'profile_image']) }}
      <span id="profile_image_error" class="text-danger"></span>
      </div>
    </div>
   
   
    {{-- <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div> --}}
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
    {{ Form::close() }} 
</div>

<div id="errors"></div>

<div class="container" >
    <div class ="row">
    <table id="userTable" class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Description</th>
                <th>Role</th>
                <th>Profile Image</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be appended here dynamically -->
        </tbody>
    </table>
    </div>

</div>
<script src="{{asset('js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>



</body>
</html>
