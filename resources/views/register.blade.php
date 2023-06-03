<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
 

  <div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse"> 
      <div class="text-center lg:text-left">
        <img class="mx-auto h-32 w-auto ml-0 mb-4" src="https://i.postimg.cc/15BQDj4w/logo.png" alt="Workflow">
        <h1 class="text-5xl font-bold">Register now!</h1>
        <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
      </div>
      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <div class="card-body">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Name</span>
            </label>
            <input type="text" placeholder="Name" class="input input-bordered" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="text" placeholder="Email" class="input input-bordered" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="text" placeholder="Password" class="input input-bordered" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password Confirmation</span>
            </label>
            <input type="text" placeholder="Retype Password" class="input input-bordered" />
            <label class="label">
              <a href="login" class="label-text-alt link link-hover">Already Account?</a>
            </label>
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>